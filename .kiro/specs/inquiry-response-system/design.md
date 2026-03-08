# Inquiry Response System - Design Document

## Overview
This document outlines the technical design for enabling admins to send responses to user inquiries and allowing users to view these responses in their dashboard.

---

## Architecture

### System Components

```
┌─────────────────────────────────────────────────────────────┐
│                        Admin Side                            │
├─────────────────────────────────────────────────────────────┤
│  Request Details Page                                        │
│  ├─ View inquiry details                                     │
│  ├─ Edit availability & remarks                              │
│  ├─ [Send Email to User] (existing)                          │
│  └─ [Send Response to User] (new)                            │
│      ├─ Update status to "Responded"                         │
│      ├─ Send email notification                              │
│      └─ Create in-app notification                           │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                        User Side                             │
├─────────────────────────────────────────────────────────────┤
│  User Dashboard                                              │
│  ├─ View inquiries list                                      │
│  ├─ Status badges (Pending/Responded)                        │
│  └─ [View Response] button (when responded)                  │
│      └─ Opens Response Modal/Page                            │
│          ├─ Inquiry details                                  │
│          ├─ Plant list with availability                     │
│          └─ Admin remarks                                    │
└─────────────────────────────────────────────────────────────┘
```

---

## Database Schema

### Existing Table: `plant_requests`

**Add new columns:**

```sql
ALTER TABLE plant_requests 
ADD COLUMN response_sent_at TIMESTAMP NULL,
ADD COLUMN responded_by INT UNSIGNED NULL,
ADD FOREIGN KEY (responded_by) REFERENCES users(id) ON DELETE SET NULL;
```

**Column Descriptions:**
- `response_sent_at`: Timestamp when admin sent response (NULL = not responded yet)
- `responded_by`: ID of admin who sent the response (NULL = not responded yet)

**Existing columns used:**
- `status`: Will be updated to "responded" when admin sends response
- `items_json`: Already contains availability and remarks for each plant

**items_json structure:**
```json
[
  {
    "plant_id": 1,
    "plant_name": "AGLAONEMA",
    "code": "N/A",
    "quantity": 100,
    "height_mm": 500,
    "spread_mm": 600,
    "spacing_mm": 400,
    "remarks": "Admin notes here",
    "availability": "Available"
  }
]
```

---

## Routes

### Admin Routes

```php
// In routes/web.php - Admin middleware group
Route::post('/requests/{id}/send-response', [ClientRequestController::class, 'sendResponse'])
    ->name('requests.send-response')
    ->middleware(['auth', 'can:access-admin']);
```

### User Routes

```php
// In routes/web.php - Auth middleware group
Route::get('/user/inquiries/{id}/response', [UserDashboardController::class, 'viewResponse'])
    ->name('user.inquiry.response')
    ->middleware('auth');
```

---

## Controllers

### ClientRequestController (Admin)

**New Method: `sendResponse()`**

```php
/**
 * Send response to user for their inquiry
 * 
 * @param int $id - Plant request ID
 * @return \Illuminate\Http\RedirectResponse
 */
public function sendResponse($id)
{
    try {
        // Find the request
        $request = PlantRequest::findOrFail($id);
        
        // Validate that items have availability set
        $items = json_decode($request->items_json, true);
        $hasAvailability = false;
        foreach ($items as $item) {
            if (!empty($item['availability'])) {
                $hasAvailability = true;
                break;
            }
        }
        
        if (!$hasAvailability) {
            return redirect()->back()->with('error', 'Please set availability for at least one plant before sending response.');
        }
        
        // Update request status
        $request->status = 'responded';
        $request->response_sent_at = now();
        $request->responded_by = auth()->id();
        $request->save();
        
        // Send email notification to user
        try {
            $this->sendResponseEmail($request);
        } catch (\Exception $e) {
            Log::error('Failed to send response email: ' . $e->getMessage());
            // Continue even if email fails
        }
        
        // Create in-app notification for user
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Notification::create([
                'user_id' => $user->id,
                'type' => 'inquiry_response',
                'title' => 'Inquiry Response',
                'message' => "Your inquiry #{$request->id} has been responded to. Click to view details.",
                'link' => route('user.inquiry.response', $request->id),
                'is_read' => false
            ]);
        }
        
        return redirect()->back()->with('success', 'Response sent successfully to user.');
        
    } catch (\Exception $e) {
        Log::error('Failed to send response: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to send response: ' . $e->getMessage());
    }
}

/**
 * Send response email to user using Brevo API
 */
private function sendResponseEmail($request)
{
    $brevoService = new \App\Services\BrevoEmailService();
    
    $subject = "Response to Your Plant Inquiry #{$request->id}";
    
    $htmlContent = view('emails.inquiry-response', [
        'request' => $request,
        'viewLink' => route('user.inquiry.response', $request->id)
    ])->render();
    
    $brevoService->sendEmail(
        $request->email,
        $request->name,
        $subject,
        $htmlContent
    );
}
```

---

### UserDashboardController (User)

**Update `index()` method:**

```php
public function index(Request $request)
{
    $user = Auth::user();

    // Fetch recent plant requests by the authenticated user's email
    $requests = PlantRequest::when($user && $user->email, function ($q) use ($user) {
            $q->where('email', $user->email);
        })
        ->orderByDesc('created_at')
        ->limit(10)
        ->get();

    return view('dashboard.user', [
        'user' => $user,
        'requests' => $requests,
    ]);
}
```

**New Method: `viewResponse()`**

```php
/**
 * View admin response for an inquiry
 * 
 * @param int $id - Plant request ID
 * @return \Illuminate\View\View
 */
public function viewResponse($id)
{
    $user = Auth::user();
    
    // Find the request and verify it belongs to this user
    $request = PlantRequest::where('id', $id)
        ->where('email', $user->email)
        ->firstOrFail();
    
    // Check if response has been sent
    if ($request->status !== 'responded' || !$request->response_sent_at) {
        return redirect()->route('dashboard.user')
            ->with('error', 'This inquiry has not been responded to yet.');
    }
    
    // Decode items JSON
    $items = json_decode($request->items_json, true);
    
    // Get admin who responded
    $respondedBy = $request->responded_by ? User::find($request->responded_by) : null;
    
    return view('user.inquiry-response', [
        'request' => $request,
        'items' => $items,
        'respondedBy' => $respondedBy
    ]);
}
```

---

## Views

### Admin Side: Request Details Page

**File:** `resources/views/admin/requests/view_request_details.blade.php` or similar

**Add new button beside existing "Send Email to User" button:**

```blade
<!-- User Information Section -->
<div class="card">
    <div class="card-header">
        <h6>User Information</h6>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $request->name }}</p>
        <p><strong>Email:</strong> {{ $request->email }}</p>
        
        <!-- Action Buttons -->
        <div class="d-flex gap-2 mt-3">
            <!-- Existing Send Email Button -->
            <form action="{{ route('requests.send-email', $request->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-envelope me-2"></i>Send Email to User
                </button>
            </form>
            
            <!-- NEW: Send Response Button -->
            <form action="{{ route('requests.send-response', $request->id) }}" method="POST" 
                  onsubmit="return confirm('This will mark the inquiry as responded and notify the user. Continue?');">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i>Send Response to User
                </button>
            </form>
        </div>
    </div>
</div>
```

---

### User Side: Dashboard

**File:** `resources/views/dashboard/user.blade.php`

**Update the inquiries table to include Actions column:**

```blade
<table class="table table-hover mb-0 align-middle">
    <thead class="table-light">
        <tr>
            <th style="width: 60px;">ID</th>
            <th>Inquiry Date</th>
            <th>Status</th>
            <th style="width: 150px;">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($requests as $r)
        <tr>
            <td>#{{ $r->id }}</td>
            <td>{{ optional($r->created_at)->format('M d, Y') ?? '—' }}</td>
            <td>
                @php
                    $status = strtolower($r->status ?? 'pending');
                    $displayStatus = $status === 'sent' ? 'received' : $status;
                    $badgeClass = $status === 'responded' ? 'success' : ($status === 'pending' ? 'warning' : 'secondary');
                @endphp
                <span class="badge bg-{{ $badgeClass }}">
                    {{ ucfirst($displayStatus) }}
                </span>
            </td>
            <td>
                @if($status === 'responded')
                    <a href="{{ route('user.inquiry.response', $r->id) }}" 
                       class="btn btn-sm btn-primary">
                        <i class="fas fa-eye me-1"></i>View Response
                    </a>
                @else
                    <span class="text-muted">—</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted py-4">
                No inquiries yet. Go to <a href="{{ route('public.plants') }}">Home</a> to place an inquiry.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
```

---

### User Side: Response View Page

**File:** `resources/views/user/inquiry-response.blade.php`

```blade
@extends('layouts.public')

@section('title', 'Inquiry Response - Salenga Farm')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="mb-0">
            <i class="fas fa-clipboard-check me-2 text-success"></i>
            Inquiry Response #{{ $request->id }}
        </h4>
        <a href="{{ route('dashboard.user') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
        </a>
    </div>

    <!-- Inquiry Information -->
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-white">
            <h6 class="mb-0">Inquiry Information</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Inquiry Date:</strong> {{ $request->created_at->format('M d, Y') }}</p>
                    <p><strong>Status:</strong> 
                        <span class="badge bg-success">Responded</span>
                    </p>
                </div>
                <div class="col-md-6">
                    <p><strong>Response Date:</strong> {{ $request->response_sent_at->format('M d, Y') }}</p>
                    @if($respondedBy)
                    <p><strong>Responded By:</strong> {{ $respondedBy->name }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Plant Availability -->
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h6 class="mb-0">Plant Availability</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Plant Name</th>
                            <th>Quantity</th>
                            <th>Height (mm)</th>
                            <th>Spread (mm)</th>
                            <th>Spacing (mm)</th>
                            <th>Availability</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item['plant_name'] ?? 'N/A' }}</td>
                            <td>{{ $item['quantity'] ?? 0 }}</td>
                            <td>{{ $item['height_mm'] ?? 'N/A' }}</td>
                            <td>{{ $item['spread_mm'] ?? 'N/A' }}</td>
                            <td>{{ $item['spacing_mm'] ?? 'N/A' }}</td>
                            <td>
                                @php
                                    $availability = $item['availability'] ?? 'N/A';
                                    $badgeClass = match($availability) {
                                        'Available' => 'success',
                                        'Limited Stock' => 'warning',
                                        'Out of Stock' => 'danger',
                                        'Pre-order' => 'purple',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }}">
                                    {{ $availability }}
                                </span>
                            </td>
                            <td>
                                @if(!empty($item['remarks']))
                                    <small>{{ $item['remarks'] }}</small>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Help Text -->
    <div class="alert alert-info mt-3">
        <i class="fas fa-info-circle me-2"></i>
        <strong>Next Steps:</strong> Our team will contact you via email or phone to finalize your order. 
        If you have any questions, please reply to the email or contact us directly.
    </div>
</div>

<style>
.badge.bg-purple {
    background-color: #6f42c1 !important;
}
</style>
@endsection
```

---

### Email Template

**File:** `resources/views/emails/inquiry-response.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #28a745; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; background-color: #f8f9fa; }
        .button { display: inline-block; padding: 12px 24px; background-color: #28a745; 
                  color: white; text-decoration: none; border-radius: 5px; margin: 20px 0; }
        .footer { text-align: center; padding: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Salenga Farm</h2>
        </div>
        <div class="content">
            <h3>Hello {{ $request->name }},</h3>
            <p>Your plant inquiry <strong>#{{ $request->id }}</strong> has been reviewed by our team.</p>
            <p>We've checked the availability of the plants you requested and added our notes.</p>
            <p>Please log in to your dashboard to view the detailed response:</p>
            <div style="text-align: center;">
                <a href="{{ $viewLink }}" class="button">View Response</a>
            </div>
            <p>If you have any questions, feel free to reply to this email or contact us directly.</p>
            <p>Thank you for choosing Salenga Farm!</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Salenga Farm. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
```

---

## Error Handling

### Validation Errors
- **No availability set:** "Please set availability for at least one plant before sending response."
- **Request not found:** 404 error page
- **Unauthorized access:** Redirect to login

### Email Failures
- Log error but continue with status update
- Show warning to admin: "Response saved but email failed to send"
- User still gets in-app notification

### Database Errors
- Rollback transaction if status update fails
- Show error message to admin
- Log detailed error for debugging

---

## Security Considerations

1. **Authorization:**
   - Admin must have `can:access-admin` permission
   - Users can only view their own inquiries (email match)

2. **Input Validation:**
   - Validate request ID exists
   - Verify availability is set before sending
   - Sanitize all user inputs

3. **CSRF Protection:**
   - All forms include `@csrf` token
   - Laravel automatically validates

4. **SQL Injection Prevention:**
   - Use Eloquent ORM (parameterized queries)
   - Never use raw SQL with user input

---

## Performance Considerations

1. **Database Queries:**
   - Use eager loading for related data
   - Index on `email` column for faster lookups
   - Index on `status` column for filtering

2. **Email Sending:**
   - Use queue for email sending (optional future enhancement)
   - Current: Synchronous sending (acceptable for low volume)

3. **Caching:**
   - Not needed for this feature (data changes frequently)

---

## Testing Strategy

### Unit Tests
- Test `sendResponse()` method
- Test `viewResponse()` method
- Test email sending logic
- Test notification creation

### Integration Tests
- Test full flow: admin sends response → user receives notification → user views response
- Test email delivery
- Test authorization checks

### Manual Testing Checklist
- [ ] Admin can send response
- [ ] Status updates to "Responded"
- [ ] Email is sent to user
- [ ] In-app notification is created
- [ ] User sees "View Response" button
- [ ] User can view response details
- [ ] Availability badges display correctly
- [ ] Remarks display correctly
- [ ] Unauthorized users cannot access other users' responses

---

## Deployment Notes

1. **Database Migration:**
   ```bash
   php artisan migrate
   ```

2. **Clear Cache:**
   ```bash
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

3. **Test Email Configuration:**
   - Verify Brevo API key is set
   - Test email sending on staging first

---

**Document Version:** 1.0  
**Created:** February 17, 2026  
**Feature:** Inquiry Response System
