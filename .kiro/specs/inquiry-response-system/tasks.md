# Inquiry Response System - Implementation Tasks

## Task List

- [x] 1. Database Migration
  - [x] 1.1 Create migration file for plant_requests table
  - [x] 1.2 Add response_sent_at column
  - [x] 1.3 Add responded_by column with foreign key
  - [x] 1.4 Run migration and verify

- [-] 2. Admin Side - Send Response Functionality
  - [x] 2.1 Add sendResponse() method to ClientRequestController
  - [x] 2.2 Add sendResponseEmail() private method
  - [x] 2.3 Add route for POST /requests/{id}/send-response
  - [x] 2.4 Update request details view to add "Send Response to User" button
  - [x] 2.5 Add confirmation dialog for send response
  - [ ] 2.6 Test send response functionality

- [-] 3. Email Template
  - [x] 3.1 Create inquiry-response.blade.php email template
  - [x] 3.2 Style email template
  - [ ] 3.3 Test email rendering
  - [ ] 3.4 Test email delivery via Brevo

- [ ] 4. Notification System
  - [ ] 4.1 Create in-app notification when response is sent
  - [ ] 4.2 Test notification creation
  - [ ] 4.3 Verify notification link works

- [-] 5. User Side - Dashboard Updates
  - [x] 5.1 Add Actions column to inquiries table
  - [x] 5.2 Add "View Response" button for responded inquiries
  - [x] 5.3 Update status badge logic to show "Responded"
  - [ ] 5.4 Test dashboard display

- [-] 6. User Side - Response View Page
  - [x] 6.1 Create inquiry-response.blade.php view
  - [x] 6.2 Add viewResponse() method to UserDashboardController
  - [x] 6.3 Add route for GET /user/inquiries/{id}/response
  - [x] 6.4 Style response page with availability badges
  - [x] 6.5 Add authorization check (user can only view own inquiries)
  - [ ] 6.6 Test response view page

- [ ] 7. Testing & Bug Fixes
  - [ ] 7.1 Test complete flow (admin sends → user views)
  - [ ] 7.2 Test email delivery
  - [ ] 7.3 Test notification system
  - [ ] 7.4 Test authorization (users can't view others' responses)
  - [ ] 7.5 Test error handling (no availability set)
  - [ ] 7.6 Fix any bugs found

- [ ] 8. UI/UX Polish
  - [ ] 8.1 Ensure buttons are properly styled
  - [ ] 8.2 Add loading states
  - [ ] 8.3 Add success/error messages
  - [ ] 8.4 Test responsive design
  - [ ] 8.5 Add purple badge color for Pre-order status

- [ ] 9. Documentation & Deployment
  - [ ] 9.1 Update SYSTEM_FUNCTIONS_BY_USER_ROLE.md
  - [ ] 9.2 Test on localhost
  - [ ] 9.3 Commit changes to git
  - [ ] 9.4 Deploy to Railway
  - [ ] 9.5 Test on production

---

## Task Details

### 1. Database Migration

**1.1 Create migration file**
```bash
php artisan make:migration add_response_fields_to_plant_requests_table
```

**1.2-1.3 Migration content:**
```php
public function up()
{
    Schema::table('plant_requests', function (Blueprint $table) {
        $table->timestamp('response_sent_at')->nullable()->after('status');
        $table->unsignedBigInteger('responded_by')->nullable()->after('response_sent_at');
        $table->foreign('responded_by')->references('id')->on('users')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('plant_requests', function (Blueprint $table) {
        $table->dropForeign(['responded_by']);
        $table->dropColumn(['response_sent_at', 'responded_by']);
    });
}
```

**1.4 Run migration:**
```bash
php artisan migrate
```

---

### 2. Admin Side - Send Response Functionality

**2.1 Add to ClientRequestController:**
See design.md for complete `sendResponse()` method

**2.2 Add private method:**
See design.md for `sendResponseEmail()` method

**2.3 Add to routes/web.php:**
```php
Route::post('/requests/{id}/send-response', [ClientRequestController::class, 'sendResponse'])
    ->name('requests.send-response')
    ->middleware(['auth', 'can:access-admin']);
```

**2.4 Update view file:**
Find the "Send Email to User" button and add new button beside it (see design.md)

**2.5 Add confirmation:**
```javascript
onsubmit="return confirm('This will mark the inquiry as responded and notify the user. Continue?');"
```

---

### 3. Email Template

**3.1 Create file:**
`resources/views/emails/inquiry-response.blade.php`

**3.2-3.3 Content:**
See design.md for complete email template

---

### 4. Notification System

**4.1 Add to sendResponse() method:**
```php
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
```

---

### 5. User Side - Dashboard Updates

**5.1-5.3 Update resources/views/dashboard/user.blade.php:**
See design.md for complete table structure with Actions column

---

### 6. User Side - Response View Page

**6.1 Create file:**
`resources/views/user/inquiry-response.blade.php`

**6.2 Add to UserDashboardController:**
See design.md for `viewResponse()` method

**6.3 Add to routes/web.php:**
```php
Route::get('/user/inquiries/{id}/response', [UserDashboardController::class, 'viewResponse'])
    ->name('user.inquiry.response')
    ->middleware('auth');
```

**6.4-6.5 View content:**
See design.md for complete view template

---

### 7. Testing Checklist

- [ ] Admin can click "Send Response to User"
- [ ] Confirmation dialog appears
- [ ] Status updates to "responded"
- [ ] response_sent_at is set
- [ ] responded_by is set to current admin
- [ ] Email is sent to user
- [ ] In-app notification is created
- [ ] User sees "View Response" button in dashboard
- [ ] User can click and view response
- [ ] Availability badges show correct colors
- [ ] Remarks display correctly
- [ ] User cannot view other users' responses
- [ ] Error shown if no availability is set

---

### 8. UI/UX Polish

**8.1 Button styles:**
- "Send Email to User": `btn btn-success` (green)
- "Send Response to User": `btn btn-primary` (blue)

**8.2 Loading states:**
Add spinner when submitting

**8.3 Messages:**
- Success: "Response sent successfully to user."
- Error: "Please set availability for at least one plant before sending response."

**8.5 Purple badge CSS:**
```css
.badge.bg-purple {
    background-color: #6f42c1 !important;
}
```

---

## Estimated Time

- Database Migration: 15 minutes
- Admin Send Response: 1 hour
- Email Template: 30 minutes
- Notification System: 30 minutes
- User Dashboard Updates: 45 minutes
- User Response View: 1 hour
- Testing & Bug Fixes: 1 hour
- UI/UX Polish: 30 minutes
- Documentation & Deployment: 30 minutes

**Total: ~6 hours**

---

## Dependencies

- Existing Brevo email service
- Existing notification system
- Existing plant_requests table
- Existing user authentication

---

## Notes

- Test thoroughly on localhost before deploying
- Verify email delivery works on Railway
- Check that notifications appear correctly
- Ensure responsive design works on mobile

---

**Document Version:** 1.0  
**Created:** February 17, 2026  
**Feature:** Inquiry Response System
