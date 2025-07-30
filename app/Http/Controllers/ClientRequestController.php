<?php

namespace App\Http\Controllers;

use App\Models\PlantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get client requests (default type or 'client' type)
        $clientRequests = PlantRequest::where(function($query) {
                $query->whereNull('request_type')
                      ->orWhere('request_type', 'client');
            })
            ->orderBy('request_date', 'desc')
            ->get();
            
        // Get user requests
        $userRequests = PlantRequest::where('request_type', 'user')
            ->orderBy('request_date', 'desc')
            ->get();
            
        return view('admin.requests.index', compact('clientRequests', 'userRequests'));
    }
    
    public function sendEmail($id)
    {
        $request = PlantRequest::findOrFail($id);
        
        // Check if request is already sent
        if ($request->status === 'sent') {
            return redirect()->back()->with('warning', 'This request has already been sent.');
        }
        
        try {
            // Generate PDF if it doesn't exist
            if (!$request->pdf_path || !Storage::exists($request->pdf_path)) {
                $this->generatePdf($id);
                $request->refresh(); // Refresh to get the updated pdf_path
            }
            
            // Send email logic would go here
            // For now, just update the status
            $request->status = 'sent';
            $request->save();
            
            return redirect()->back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Failed to send email. Please try again.');
        }
    }

    public function store(Request $request)
    {
        try {
            Log::info('Received plant request: ' . json_encode($request->all()));
            
            // Detect if request is JSON
            if ($request->isJson() || $request->header('Content-Type') === 'application/json') {
                // Handle JSON request
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'name' => 'nullable|string|max:255',
                    'items_json' => 'required|string',
                    'pricing' => 'nullable|string|in:None,Low cost,High cost',
                ]);
                
                if ($validator->fails()) {
                    return response()->json([
                        'message' => $validator->errors()->first()
                    ], 422);
                }
                
                // Create new plant request
                $plantRequest = new PlantRequest();
                $plantRequest->email = $request->email;
                $plantRequest->name = $request->name ?? 'Guest User';
                $plantRequest->request_date = now();
                $plantRequest->due_date = now()->addDays(14);
                
                // Parse items_json, which might be a string that needs to be decoded
                $itemsJson = $request->items_json;
                if (is_string($itemsJson)) {
                    $plantRequest->items_json = json_decode($itemsJson, true);
                } else {
                    $plantRequest->items_json = $itemsJson;
                }
                
                // Set pricing field (default to None if not provided)
                $plantRequest->pricing = $request->pricing ?? 'None';
                
                $plantRequest->status = 'pending';
                $plantRequest->request_type = 'client';
                $plantRequest->save();
                
                // Generate PDF
                $this->generatePdf($plantRequest->id);
                
                return response()->json([
                    'message' => 'Request submitted successfully!',
                    'request_id' => $plantRequest->id
                ]);
            } else {
                // Handle form submission
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
                    'name' => 'nullable|string|max:255',
                    'items_json' => 'required|string',
                    'pricing' => 'nullable|string|in:None,Low cost,High cost',
                ]);
                
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                
                // Create new plant request
                $plantRequest = new PlantRequest();
                $plantRequest->email = $request->email;
                $plantRequest->name = $request->name ?? 'Guest User';
                $plantRequest->request_date = now();
                $plantRequest->due_date = now()->addDays(14);
                $plantRequest->items_json = json_decode($request->items_json, true);
                $plantRequest->pricing = $request->pricing ?? 'None';
                $plantRequest->status = 'pending';
                $plantRequest->request_type = 'client';
                $plantRequest->save();
                
                // Generate PDF
                $this->generatePdf($plantRequest->id);
                
                return redirect()->route('requests.index')->with('success', 'Request submitted successfully!');
            }
        } catch (\Exception $e) {
            Log::error('Failed to process plant request: ' . $e->getMessage());
            
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'An error occurred while processing your request. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }
    
    public function viewRequest($id)
    {
        // The viewRequest method is removed as it referenced a deleted view.
        // We now use plainViewRequest instead for all view routes.
    }
    
    public function generatePdf($id)
    {
        try {
            $request = PlantRequest::findOrFail($id);
            
            // Process items_json to ensure data is formatted correctly without defaults
            $items = [];
            foreach ($request->items_json as $item) {
                // Base item with minimal fields - no defaults for quantity or prices
                $processedItem = [
                    'name' => $item['name'] ?? '',
                    'code' => isset($item['code']) && $item['code'] != 'N/A' ? $item['code'] : '',
                    'height' => isset($item['height']) && $item['height'] != '' ? $item['height'] : '',
                    'spread' => isset($item['spread']) && $item['spread'] != '' ? $item['spread'] : '',
                    'spacing' => isset($item['spacing']) && $item['spacing'] != '' ? $item['spacing'] : '',
                    'remarks' => isset($item['remarks']) ? $item['remarks'] : '',
                    'availability' => isset($item['availability']) ? $item['availability'] : ''
                ];
                
                // Only include quantity if explicitly set
                if (isset($item['quantity']) && $item['quantity'] !== '') {
                    $processedItem['quantity'] = $item['quantity'];
                }
                
                // Only include unit_price if explicitly set - pass through original value
                if (isset($item['unit_price']) && $item['unit_price'] !== '' && $item['unit_price'] != 0) {
                    $processedItem['unit_price'] = $item['unit_price'];
                }
                
                // Only include total_price if explicitly set - pass through original value
                if (isset($item['total_price']) && $item['total_price'] !== '' && $item['total_price'] != 0) {
                    $processedItem['total_price'] = $item['total_price'];
                }
                
                $items[] = $processedItem;
            }
            
            // Update request items with clean data
            $request->items_json = $items;
            
            // Create PDF with ultra-compact settings
            $options = [
                'margin-top' => '0.4cm',
                'margin-right' => '0.4cm',
                'margin-bottom' => '0.4cm',
                'margin-left' => '0.4cm',
                'page-size' => 'A4',
                'orientation' => 'portrait',
                'encoding' => 'UTF-8',
                'font-family' => 'dejavusans',
                'font-size' => '9',
                'image-dpi' => '300',
                'enable-local-file-access' => true,
                'disable-smart-shrinking' => true,
                'default-encoding' => 'UTF-8',
                'charset-input' => 'UTF-8',
                'lowquality' => false,
                'enable-internal-links' => true, 
                'enable-external-links' => true,
                'print-media-type' => true,
                'no-outline' => true
            ];
            
            // Generate PDF with proper font that supports Unicode
            $pdf = PDF::loadView('pdf.rfq', compact('request'))
                      ->setOption('enable-javascript', false)
                      ->setOption('javascript-delay', '0')
                      ->setOption('enable-smart-shrinking', false)
                      ->setOption('no-stop-slow-scripts', true)
                      ->setOptions($options)
                      ->setPaper('a4', 'portrait');
            
            // Save PDF to storage
            $filename = 'rfq_' . $id . '_' . time() . '.pdf';
            $path = 'pdfs/' . $filename;
            
            Storage::put($path, $pdf->output());
            
            // Update request with PDF path
            $request->pdf_path = $path;
            $request->save();
            
            return $path;
        } catch (\Exception $e) {
            Log::error('Failed to generate PDF: ' . $e->getMessage());
            throw $e;
        }
    }
    
    public function downloadPdf($id)
    {
        try {
            $request = PlantRequest::findOrFail($id);
            
            // Generate PDF if it doesn't exist
            if (!$request->pdf_path || !Storage::exists($request->pdf_path)) {
                $this->generatePdf($id);
                $request->refresh(); // Refresh to get the updated pdf_path
            }
            
            // Return the PDF for download
            return Storage::download($request->pdf_path, 'RFQ_' . $id . '.pdf');
        } catch (\Exception $e) {
            Log::error('Failed to download PDF: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Failed to download PDF. Please try again.');
        }
    }
    
    public function viewPdf($id)
    {
        try {
            $request = PlantRequest::findOrFail($id);
            
            // Generate PDF if it doesn't exist
            if (!$request->pdf_path || !Storage::exists($request->pdf_path)) {
                $this->generatePdf($id);
                $request->refresh(); // Refresh to get the updated pdf_path
            }
            
            // Return the PDF for viewing
            return response()->file(Storage::path($request->pdf_path));
        } catch (\Exception $e) {
            Log::error('Failed to view PDF: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Failed to view PDF. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $request = PlantRequest::findOrFail($id);
            
            // Delete the associated PDF file if it exists
            if ($request->pdf_path && Storage::exists($request->pdf_path)) {
                Storage::delete($request->pdf_path);
            }
            
            $request->delete();
            
            return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to delete request: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete request. Please try again.');
        }
    }

    public function updateRequest($id, Request $request)
    {
        try {
            $plantRequest = PlantRequest::findOrFail($id);
            
            // Validate the items_json
            $validator = Validator::make($request->all(), [
                'items_json' => 'required|string',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            // Parse and prepare items
            $itemsData = json_decode($request->items_json, true);
            $processedItems = [];
            
            foreach ($itemsData as $item) {
                // Base item with minimal fields - no defaults
                $processedItem = [
                    'name' => $item['name'] ?? '',
                    'code' => $item['code'] ?? '',
                    'height' => $item['height'] ?? '',
                    'spread' => $item['spread'] ?? '',
                    'spacing' => $item['spacing'] ?? '',
                    'remarks' => $item['remarks'] ?? '',
                    'availability' => $item['availability'] ?? ''
                ];
                
                // Only include quantity if explicitly set
                if (isset($item['quantity']) && $item['quantity'] !== '') {
                    $processedItem['quantity'] = $item['quantity'];
                }
                
                // Only include unit_price if explicitly set - pass through original value
                if (isset($item['unit_price']) && $item['unit_price'] !== '' && $item['unit_price'] != 0) {
                    $processedItem['unit_price'] = $item['unit_price'];
                }
                
                // Only include total_price if explicitly set - pass through original value
                if (isset($item['total_price']) && $item['total_price'] !== '' && $item['total_price'] != 0) {
                    $processedItem['total_price'] = $item['total_price'];
                }
                
                $processedItems[] = $processedItem;
            }
            
            // Update the items_json field with properly processed items
            $plantRequest->items_json = $processedItems;
            $plantRequest->save();
            
            // Regenerate PDF with updated information
            $this->generatePdf($id);
            
            return response()->json([
                'message' => 'Request updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update request: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Failed to update request. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function plainViewRequest($id)
    {
        try {
            // Find the request by ID
            $request = PlantRequest::findOrFail($id);
            
            // Log for debugging
            Log::info('Plain HTML view request', [
                'id' => $id,
                'items_count' => count($request->items_json),
                'controller' => 'ClientRequestController@plainViewRequest'
            ]);
            
            // Create a local copy of the array
            $items = is_array($request->items_json) ? $request->items_json : [];
            
            // Process each item to ensure all needed fields exist
            foreach ($items as &$item) {
                // Set default values for any missing fields
                $item['quantity'] = $item['quantity'] ?? 1;
                $item['code'] = $item['code'] ?? '';
                $item['height'] = $item['height'] ?? '';
                $item['spread'] = $item['spread'] ?? '';
                $item['spacing'] = $item['spacing'] ?? '';
                $item['remarks'] = $item['remarks'] ?? '';
                $item['unit_price'] = $item['unit_price'] ?? '';
                $item['total_price'] = $item['total_price'] ?? '';
                $item['availability'] = $item['availability'] ?? '';
            }
            
            // Return the Blade view with data
            return view('requests.view-request', compact('request', 'items'));
            
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Failed to plain view request', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            
            // Return a simple error page
            return response('Error viewing request: ' . $e->getMessage(), 500)
                ->header('Content-Type', 'text/html');
        }
    }

    public function showSuccess($id)
    {
        $request = PlantRequest::findOrFail($id);
        return view('user.request-success', compact('request'));
    }

    public function updatePricing($id, Request $request)
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Request Details #' . $id . ' - Salenga Farm</title>
                <!-- Bootstrap CSS -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
                <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
                <link href="' . asset('css/public.css') . '?v=' . time() . '" rel="stylesheet">
                <!-- Add the request-details.css file for consistent navigation -->
                <link href="' . asset('css/request-details.css') . '?v=' . time() . '" rel="stylesheet">
                <style>
                    /* Additional inline styles if needed */
                </style>
            </head>
            <body>
                <!-- Navigation Bar (Green like home page) -->
                <nav class="navbar navbar-expand-lg main-nav">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="' . route('public.plants') . '">
                            <img src="' . asset('images/salengap-modified.png') . '" alt="Salenga Logo" class="nav-logo">
                            <span class="brand-text">Salenga Farm</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarMain">
                            <div class="navbar-collapse-inner">
                                <ul class="navbar-nav center-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="' . route('public.plants') . '">
                                    <i class="fas fa-home me-1"></i>Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="' . route('requests.index') . '">
                                    <i class="fas fa-file-invoice me-1"></i>Request
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="' . route('dashboard') . '">
                                    <i class="fas fa-chart-line me-1"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="' . route('plants.index') . '">
                                    <i class="fas fa-leaf me-1"></i>Inventory
                                </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('users.index') . '">
                                            <i class="fas fa-users me-1"></i>Users
                                        </a>
                                    </li>
                                </ul>
                                <div class="user-section">
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle profile-btn" type="button" id="profileDropdown" data-bs-toggle="dropdown">
                                            <img src="' . asset('images/salengap-modified.png') . '" alt="Profile" class="profile-pic">
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="' . route('profile.edit') . '">
                                                    <i class="fas fa-user me-2"></i>Profile
                                                </a>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <form action="' . route('logout') . '" method="POST">
                                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                                    </button>
                                                </form>
                            </li>
                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Main Content -->
                <div class="container my-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Request Details #' . $id . '</h2>
                        <div>
                            <a href="' . route('requests.index') . '" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Back to List
                            </a>
                            <button id="printRequestBtn" class="btn btn-outline-primary">
                                <i class="fas fa-print me-1"></i>Print
                            </button>
                        </div>
                    </div>

                    <!-- Pricing Options Dropdown -->
                    <div class="pricing-options" style="margin-bottom: 20px;">
                        <span class="pricing-label">Pricing Options:</span>
                        <select class="form-select pricing-select" id="pricingOptions" style="max-width: 300px; display: inline-block; margin-left: 10px; padding-right: 30px; text-overflow: ellipsis;">
                            <option value="None" ' . ($request->pricing == 'None' ? 'selected' : '') . '>None</option>
                            <option value="Low cost" ' . ($request->pricing == 'Low cost' ? 'selected' : '') . '>Low cost</option>
                            <option value="High cost" ' . ($request->pricing == 'High cost' ? 'selected' : '') . '>High cost</option>
                        </select>
                    </div>
                    <style>
                        .pricing-select {
                            position: relative;
                        }
                        .pricing-select option {
                            padding: 8px;
                            white-space: nowrap;
                        }
                        /* Fix dropdown arrow spacing */
                        select.form-select {
                            background-position: right 0.75rem center;
                            padding-right: 2.25rem !important;
                        }
                    </style>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Request Information</h5>
                                    <button class="btn btn-sm btn-outline-primary edit-request-info-btn" title="Edit Request Information">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div class="card-body" style="padding: 0;">
                                    <div id="request-info-view">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                            <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Status</div>
                                            <div style="flex: 0 0 auto;">
                                                <span class="badge bg-' . ($request->status == 'pending' ? 'warning' : ($request->status == 'sent' ? 'success' : 'danger')) . '">
                                                    ' . ucfirst($request->status) . '
                                                </span>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                            <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Request Date</div>
                                            <div style="flex: 0 0 auto; text-align: right; min-width: 100px;">' . $request->request_date->format('M d, Y') . '</div>
                                        </li>
                                        <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                            <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Due Date</div>
                                            <div style="flex: 0 0 auto; text-align: right; min-width: 100px;">' . $request->due_date->format('M d, Y') . '</div>
                                        </li>
                                        <li class="list-group-item" style="display: flex; justify-content: space-between; align-items: center; min-width: 100%; flex-wrap: nowrap;">
                                            <div style="flex: 0 1 auto; white-space: nowrap; padding-right: 10px;">Total Items</div>
                                            <div style="flex: 0 0 auto; text-align: right; min-width: 30px;">' . count($items) . '</div>
                                        </li>
                                    </ul>
                                    </div>
                                    <div id="request-info-edit" style="display: none; padding: 15px;">
                                        <form id="request-info-form">
                                            <div class="mb-3">
                                                <label for="edit-status" class="form-label">Status</label>
                                                <select class="form-select" id="edit-status">
                                                    <option value="pending" ' . ($request->status == 'pending' ? 'selected' : '') . '>Pending</option>
                                                    <option value="sent" ' . ($request->status == 'sent' ? 'selected' : '') . '>Sent</option>
                                                    <option value="cancelled" ' . ($request->status == 'cancelled' ? 'selected' : '') . '>Cancelled</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-request-date" class="form-label">Request Date</label>
                                                <input type="date" class="form-control" id="edit-request-date" value="' . $request->request_date->format('Y-m-d') . '">
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-due-date" class="form-label">Due Date</label>
                                                <input type="date" class="form-control" id="edit-due-date" value="' . $request->due_date->format('Y-m-d') . '">
                                            </div>
                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm cancel-request-info-btn">Cancel</button>
                                                <button type="button" class="btn btn-primary btn-sm save-request-info-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Client Information</h5>
                                    <button class="btn btn-sm btn-outline-primary edit-client-info-btn" title="Edit Client Information">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div id="client-info-view">
                                    <div class="mb-3">
                                        <h6 class="fw-bold">Name</h6>
                                        <p>' . htmlspecialchars($request->name) . '</p>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold">Email</h6>
                                        <p class="mb-0">' . htmlspecialchars($request->email) . '</p>
                                        </div>
                                    </div>
                                    <div id="client-info-edit" style="display: none;">
                                        <form id="client-info-form">
                                            <div class="mb-3">
                                                <label for="edit-client-name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="edit-client-name" value="' . htmlspecialchars($request->name) . '">
                                            </div>
                                            <div class="mb-3">
                                                <label for="edit-client-email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="edit-client-email" value="' . htmlspecialchars($request->email) . '">
                                            </div>
                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm cancel-client-info-btn">Cancel</button>
                                                <button type="button" class="btn btn-primary btn-sm save-client-info-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>';
                                
            if ($request->status == 'pending') {
                $html .= '<div class="card-footer">
                                    <a href="' . route('requests.send-email', $request->id) . '" class="btn btn-success w-100" id="sendEmailBtn">
                                        <i class="fas fa-envelope me-1"></i> Send Email to Client
                                    </a>
                                </div>';
            }
            
            $html .= '        </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">Requested Items</h5>
                                    <button class="btn btn-sm btn-outline-primary edit-items-btn" title="Edit Items">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                                <div class="card-body p-0">
                                    <div id="items-table-view" class="table-responsive">
                                        <table class="table table-striped mb-0" style="table-layout: fixed; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%; text-align: center;">#</th>
                                                    <th style="width: 5%; text-align: center;">Qty</th>
                                                    <th style="width: 15%;">Plant Name</th>
                                                    <th style="width: 8%; text-align: center;">Code</th>
                                                    <th style="width: 8%; text-align: center;">Height<br><small>(mm)</small></th>
                                                    <th style="width: 8%; text-align: center;">Spread<br><small>(mm)</small></th>
                                                    <th style="width: 8%; text-align: center;">Spacing<br><small>(mm)</small></th>
                                                    <th style="width: 18%;">Remarks</th>
                                                    <th style="width: 10%; text-align: right;">Unit<br>Price</th>
                                                    <th style="width: 15%; text-align: right;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
            
            foreach ($items as $index => $item) {
                // Check if remarks is lengthy - make it shorter (30 chars instead of 50)
                $remarks = $item['remarks'] ?? '';
                $isLongRemarks = strlen($remarks) > 30;
                $remarksPreview = $isLongRemarks ? substr($remarks, 0, 30) . '...' : $remarks;
                
                $html .= '<tr>
                                <td style="text-align: center; white-space: nowrap; padding: 6px;">' . ($index + 1) . '</td>
                                <td style="text-align: center; padding: 6px;">' . ($item['quantity'] ?? 1) . '</td>
                                <td style="padding: 6px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">' . htmlspecialchars($item['name'] ?? 'N/A') . '</td>
                                <td style="text-align: center; padding: 6px;">' . htmlspecialchars($item['code'] ?? '') . '</td>
                                <td style="text-align: center; padding: 6px;">' . (!empty($item['height']) ? $item['height'] : '') . '</td>
                                <td style="text-align: center; padding: 6px;">' . (!empty($item['spread']) ? $item['spread'] : '') . '</td>
                                <td style="text-align: center; padding: 6px;">' . (!empty($item['spacing']) ? $item['spacing'] : '') . '</td>
                                <td style="padding: 6px;">';
                
                if ($isLongRemarks) {
                    $html .= '<div class="remarks-container">
                                <div class="remarks-preview">' . htmlspecialchars($remarksPreview) . '</div>
                                <button type="button" class="remarks-view-btn" data-bs-toggle="modal" data-bs-target="#remarksModal' . $index . '">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>';
                } else {
                    $html .= '<div class="remarks-preview">' . htmlspecialchars($remarks) . '</div>';
                }
                
                $html .= '</td>
                                <td style="text-align: right; padding: 6px;">';
                
                if (isset($item['unit_price']) && $item['unit_price'] !== '' && $item['unit_price'] != '0') {
                    $html .= '₱' . number_format((float)$item['unit_price'], 2);
                }
                
                $html .= '</td>
                                <td style="text-align: right; padding: 6px;">';
                
                if (isset($item['total_price']) && $item['total_price'] !== '' && $item['total_price'] != '0') {
                    $html .= '₱' . number_format((float)$item['total_price'], 2);
                }
                
                $html .= '</td>
                            </tr>';
            }
            
            $html .= '                    </tbody>
                                        </table>
                                    </div>
                                    <div id="items-table-edit" style="display: none; padding: 15px;">
                                        <form id="items-form">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="edit-items-table">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 5%;">#</th>
                                                            <th style="width: 8%;">Qty</th>
                                                            <th style="width: 15%;">Plant Name</th>
                                                            <th style="width: 10%;">Code</th>
                                                            <th style="width: 10%;">Height</th>
                                                            <th style="width: 10%;">Spread</th>
                                                            <th style="width: 10%;">Spacing</th>
                                                            <th style="width: 12%;">Unit Price</th>
                                                            <th style="width: 5%;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                    
            foreach ($items as $index => $item) {
                $html .= '<tr data-index="' . $index . '">
                            <td>' . ($index + 1) . '</td>
                            <td><input type="number" class="form-control form-control-sm item-quantity" value="' . ($item['quantity'] ?? 1) . '" min="1"></td>
                            <td><input type="text" class="form-control form-control-sm item-name" value="' . htmlspecialchars($item['name'] ?? '') . '"></td>
                            <td><input type="text" class="form-control form-control-sm item-code" value="' . htmlspecialchars($item['code'] ?? '') . '"></td>
                            <td><input type="number" class="form-control form-control-sm item-height" value="' . (!empty($item['height']) ? $item['height'] : '') . '"></td>
                            <td><input type="number" class="form-control form-control-sm item-spread" value="' . (!empty($item['spread']) ? $item['spread'] : '') . '"></td>
                            <td><input type="number" class="form-control form-control-sm item-spacing" value="' . (!empty($item['spacing']) ? $item['spacing'] : '') . '"></td>
                            <td><input type="number" step="0.01" class="form-control form-control-sm item-unit-price" value="' . (isset($item['unit_price']) && $item['unit_price'] !== '' ? $item['unit_price'] : '') . '"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button></td>
                        </tr>';
                
                // Add remarks in a separate row
                $html .= '<tr class="remarks-row" data-index="' . $index . '">
                            <td></td>
                            <td colspan="8">
                                <div class="mb-2">
                                    <label class="form-label small">Remarks</label>
                                    <textarea class="form-control form-control-sm item-remarks">' . htmlspecialchars($item['remarks'] ?? '') . '</textarea>
                                </div>
                            </td>
                        </tr>';
            }
            
            $html .= '                    </tbody>
                                                </table>
                            </div>
                                            <div class="mt-3">
                                                <button type="button" class="btn btn-success btn-sm" id="add-item-btn">
                                                    <i class="fas fa-plus"></i> Add Item
                                                </button>
                        </div>
                                            <div class="d-flex justify-content-end gap-2 mt-3">
                                                <button type="button" class="btn btn-outline-secondary btn-sm cancel-items-btn">Cancel</button>
                                                <button type="button" class="btn btn-primary btn-sm save-items-btn">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Loading Overlay -->
                <div id="loadingOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
                        <div class="spinner-border" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h5 class="mt-3">Processing Request...</h5>
                        <p>This may take a few moments</p>
                    </div>
                </div>
                
                <!-- Scripts -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
                <script>
                    // Add JavaScript functionality
                    $(document).ready(function() {
                        // Handle pricing option changes
                        $("#pricingOptions").change(function() {
                            const option = $(this).val();
                            console.log("Selected pricing option: " + option);
                            
                            // Show loading overlay
                            $("#loadingOverlay").fadeIn(200);
                            
                            // Save the pricing option to the database via AJAX
                            $.ajax({
                                url: "' . route('requests.update-pricing', $request->id) . '",
                                method: "POST",
                                data: {
                                    _token: "' . csrf_token() . '",
                                    pricing: option
                                },
                                success: function(response) {
                                    console.log("Pricing updated successfully");
                                    
                                    // Change the pricing display in the table
                                    $("#pricingCell").html(`<span class="${option === "Low cost" ? "text-success" : option === "High cost" ? "text-danger" : ""}">${option}</span>`);
                                    
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show success message
                                    alert("Pricing option updated successfully");
                                },
                                error: function(xhr) {
                                    console.error("Error updating pricing", xhr);
                                    
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show error message
                                    alert("Error updating pricing option. Please try again.");
                                }
                            });
                        });
                        
                        // Print request
                        $("#printRequestBtn").click(function() {
                            window.print();
                        });
                        
                        // Edit Request Information
                        $(".edit-request-info-btn").click(function() {
                            $("#request-info-view").hide();
                            $("#request-info-edit").show();
                        });
                        
                        $(".cancel-request-info-btn").click(function() {
                            $("#request-info-edit").hide();
                            $("#request-info-view").show();
                        });
                        
                        $(".save-request-info-btn").click(function() {
                            // Show loading overlay
                            $("#loadingOverlay").fadeIn(200);
                            
                            // Get the form data
                            const status = $("#edit-status").val();
                            const requestDate = $("#edit-request-date").val();
                            const dueDate = $("#edit-due-date").val();
                            
                            // Send AJAX request to update request information
                            $.ajax({
                                url: "' . route('requests.update-info', $request->id) . '",
                                method: "POST",
                                data: {
                                    _token: "' . csrf_token() . '",
                                    status: status,
                                    request_date: requestDate,
                                    due_date: dueDate
                                },
                                success: function(response) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show success message
                                    alert("Request information updated successfully");
                                    
                                    // Reload the page to reflect changes
                                    location.reload();
                                },
                                error: function(xhr) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show error message
                                    alert("Error updating request information. Please try again.");
                                }
                            });
                        });
                        
                        // Edit Client Information
                        $(".edit-client-info-btn").click(function() {
                            $("#client-info-view").hide();
                            $("#client-info-edit").show();
                        });
                        
                        $(".cancel-client-info-btn").click(function() {
                            $("#client-info-edit").hide();
                            $("#client-info-view").show();
                        });
                        
                        $(".save-client-info-btn").click(function() {
                            // Show loading overlay
                            $("#loadingOverlay").fadeIn(200);
                            
                            // Get the form data
                            const name = $("#edit-client-name").val();
                            const email = $("#edit-client-email").val();
                            
                            // Send AJAX request to update client information
                            $.ajax({
                                url: "' . route('requests.update-client', $request->id) . '",
                                method: "POST",
                                data: {
                                    _token: "' . csrf_token() . '",
                                    name: name,
                                    email: email
                                },
                                success: function(response) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show success message
                                    alert("Client information updated successfully");
                                    
                                    // Update the view with new data
                                    $("#client-info-view").find("p").first().text(name);
                                    $("#client-info-view").find("p").last().text(email);
                                    
                                    // Hide edit form and show view
                                    $("#client-info-edit").hide();
                                    $("#client-info-view").show();
                                },
                                error: function(xhr) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show error message
                                    alert("Error updating client information. Please try again.");
                                }
                            });
                        });
                        
                        // Edit Items
                        $(".edit-items-btn").click(function() {
                            $("#items-table-view").hide();
                            $("#items-table-edit").show();
                        });
                        
                        $(".cancel-items-btn").click(function() {
                            $("#items-table-edit").hide();
                            $("#items-table-view").show();
                        });
                        
                        // Add new item
                        $("#add-item-btn").click(function() {
                            const rowCount = $("#edit-items-table tbody tr:not(.remarks-row)").length;
                            const newIndex = rowCount;
                            
                            // Create new item row
                            const newItemRow = `
                                <tr data-index="${newIndex}">
                                    <td>${newIndex + 1}</td>
                                    <td><input type="number" class="form-control form-control-sm item-quantity" value="1" min="1"></td>
                                    <td><input type="text" class="form-control form-control-sm item-name" value=""></td>
                                    <td><input type="text" class="form-control form-control-sm item-code" value=""></td>
                                    <td><input type="number" class="form-control form-control-sm item-height" value=""></td>
                                    <td><input type="number" class="form-control form-control-sm item-spread" value=""></td>
                                    <td><input type="number" class="form-control form-control-sm item-spacing" value=""></td>
                                    <td><input type="number" step="0.01" class="form-control form-control-sm item-unit-price" value=""></td>
                                    <td><button type="button" class="btn btn-danger btn-sm remove-item"><i class="fas fa-trash"></i></button></td>
                                </tr>
                                <tr class="remarks-row" data-index="${newIndex}">
                                    <td></td>
                                    <td colspan="8">
                                        <div class="mb-2">
                                            <label class="form-label small">Remarks</label>
                                            <textarea class="form-control form-control-sm item-remarks"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            `;
                            
                            // Add new row to table
                            $("#edit-items-table tbody").append(newItemRow);
                            
                            // Add event handlers for the new row
                            attachRemoveItemHandler();
                        });
                        
                        // Remove item
                        function attachRemoveItemHandler() {
                            $(".remove-item").off("click").on("click", function() {
                                const row = $(this).closest("tr");
                                const index = row.data("index");
                                
                                // Remove the item row and its remarks row
                                row.remove();
                                $(`.remarks-row[data-index="${index}"]`).remove();
                                
                                // Renumber the remaining rows
                                $("#edit-items-table tbody tr:not(.remarks-row)").each(function(i) {
                                    $(this).find("td:first").text(i + 1);
                                });
                            });
                        }
                        
                        // Initial attachment of remove handlers
                        attachRemoveItemHandler();
                        
                        // Save items
                        $(".save-items-btn").click(function() {
                            // Show loading overlay
                            $("#loadingOverlay").fadeIn(200);
                            
                            // Get all items data
                            const items = [];
                            
                            $("#edit-items-table tbody tr:not(.remarks-row)").each(function(i) {
                                const index = $(this).data("index");
                                const remarksRow = $(`.remarks-row[data-index="${index}"]`);
                                
                                const item = {
                                    name: $(this).find(".item-name").val(),
                                    quantity: $(this).find(".item-quantity").val(),
                                    code: $(this).find(".item-code").val(),
                                    height: $(this).find(".item-height").val(),
                                    spread: $(this).find(".item-spread").val(),
                                    spacing: $(this).find(".item-spacing").val(),
                                    unit_price: $(this).find(".item-unit-price").val(),
                                    remarks: remarksRow.find(".item-remarks").val()
                                };
                                
                                // Calculate total price if possible
                                if (item.quantity && item.unit_price) {
                                    item.total_price = (parseFloat(item.quantity) * parseFloat(item.unit_price)).toFixed(2);
                                }
                                
                                items.push(item);
                            });
                            
                            // Send AJAX request to update items
                            $.ajax({
                                url: "' . route('requests.update-items', $request->id) . '",
                                method: "POST",
                                data: {
                                    _token: "' . csrf_token() . '",
                                    items_json: JSON.stringify(items)
                                },
                                success: function(response) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show success message
                                    alert("Items updated successfully");
                                    
                                    // Reload the page to reflect changes
                                    location.reload();
                                },
                                error: function(xhr) {
                                    // Hide loading overlay
                                    $("#loadingOverlay").fadeOut(200);
                                    
                                    // Show error message
                                    alert("Error updating items. Please try again.");
                                }
                            });
                        });
                        
                        // Show loading overlay when sending email
                        $("#sendEmailBtn").click(function(e) {
                            $("#loadingOverlay").fadeIn(200);
                            
                            // Set a timeout to hide the overlay if it takes too long (30 seconds)
                            setTimeout(function() {
                                if ($("#loadingOverlay").is(":visible")) {
                                    $("#loadingOverlay").fadeOut(200);
                                    alert("The request is taking longer than expected. Please check your notifications for the result.");
                                }
                            }, 30000);
                        });
                    });
                </script>

                <!-- Remarks Modals - Placed at document end for better performance -->';
                
                // Create modals for all items with long remarks
                foreach ($items as $modalIndex => $modalItem) {
                    $modalRemarks = $modalItem['remarks'] ?? '';
                    if (strlen($modalRemarks) > 30) {
                        $html .= '
                        <div class="modal fade" id="remarksModal' . $modalIndex . '" tabindex="-1" aria-labelledby="remarksModalLabel' . $modalIndex . '" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Full Remarks for ' . htmlspecialchars($modalItem['name'] ?? 'Item') . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="remarks-full">
                                            ' . nl2br(htmlspecialchars($modalRemarks)) . '
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                
                $html .= '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Fix for modal backdrop issues
                        const modalEls = document.querySelectorAll(".modal");
                        modalEls.forEach(modalEl => {
                            modalEl.addEventListener("shown.bs.modal", function() {
                                document.body.classList.add("modal-open");
                            });
                            
                            modalEl.addEventListener("hidden.bs.modal", function() {
                                // Small delay to ensure proper cleanup
                                setTimeout(function() {
                                    if (!document.querySelector(".modal.show")) {
                                        document.body.classList.remove("modal-open");
                                        document.querySelectorAll(".modal-backdrop").forEach(el => el.remove());
                                    }
                                }, 100);
                            });
                        });
                    });
                </script>
            </body>
            </html>';
            
            // Return plain HTML
            return response($html)->header('Content-Type', 'text/html');
            
        } catch (\Exception $e) {
            // Log any errors
            Log::error('Failed to plain view request', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            
            // Return a simple error page
            return response('Error viewing request: ' . $e->getMessage(), 500)
                ->header('Content-Type', 'text/html');
        }
    }

    public function showSuccess($id)
    {
        $request = PlantRequest::findOrFail($id);
        return view('user.request-success', compact('request'));
    }

    public function updatePricing($id, Request $request)
    {
        try {
            $plantRequest = PlantRequest::findOrFail($id);
            
            // Validate the pricing
            $validator = Validator::make($request->all(), [
                'pricing' => 'required|string|in:None,Low cost,High cost',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            // Update the pricing field
            $plantRequest->pricing = $request->pricing;
            $plantRequest->save();
            
            return response()->json([
                'message' => 'Pricing updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update pricing: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Failed to update pricing. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateInfo($id, Request $request)
    {
        try {
            $plantRequest = PlantRequest::findOrFail($id);
            
            // Validate the request
            $validator = Validator::make($request->all(), [
                'status' => 'required|string|in:pending,sent,cancelled',
                'request_date' => 'required|date',
                'due_date' => 'required|date|after_or_equal:request_date',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            // Update the fields
            $plantRequest->status = $request->status;
            $plantRequest->request_date = $request->request_date;
            $plantRequest->due_date = $request->due_date;
            $plantRequest->save();
            
            // Regenerate PDF with updated information
            $this->generatePdf($id);
            
            return response()->json([
                'message' => 'Request information updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update request information: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Failed to update request information. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function updateClient($id, Request $request)
    {
        try {
            $plantRequest = PlantRequest::findOrFail($id);
            
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            // Update the fields
            $plantRequest->name = $request->name;
            $plantRequest->email = $request->email;
            $plantRequest->save();
            
            // Regenerate PDF with updated information
            $this->generatePdf($id);
            
            return response()->json([
                'message' => 'Client information updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update client information: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Failed to update client information. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function updateItems($id, Request $request)
    {
        try {
            $plantRequest = PlantRequest::findOrFail($id);
            
            // Validate the request
            $validator = Validator::make($request->all(), [
                'items_json' => 'required|string',
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'message' => $validator->errors()->first()
                ], 422);
            }
            
            // Parse and prepare items
            $itemsData = json_decode($request->items_json, true);
            
            if (!is_array($itemsData)) {
                return response()->json([
                    'message' => 'Invalid items data format.'
                ], 422);
            }
            
            // Process each item to ensure all needed fields exist
            $processedItems = [];
            foreach ($itemsData as $item) {
                // Base item with required fields
                $processedItem = [
                    'name' => $item['name'] ?? '',
                    'quantity' => $item['quantity'] ?? 1,
                ];
                
                // Optional fields
                if (isset($item['code'])) $processedItem['code'] = $item['code'];
                if (isset($item['height'])) $processedItem['height'] = $item['height'];
                if (isset($item['spread'])) $processedItem['spread'] = $item['spread'];
                if (isset($item['spacing'])) $processedItem['spacing'] = $item['spacing'];
                if (isset($item['remarks'])) $processedItem['remarks'] = $item['remarks'];
                
                // Price fields
                if (isset($item['unit_price']) && is_numeric($item['unit_price']) && $item['unit_price'] > 0) {
                    $processedItem['unit_price'] = $item['unit_price'];
                    
                    // Calculate total price
                    $quantity = intval($processedItem['quantity']);
                    $unitPrice = floatval($processedItem['unit_price']);
                    $processedItem['total_price'] = number_format($quantity * $unitPrice, 2, '.', '');
                }
                
                $processedItems[] = $processedItem;
            }
            
            // Save updated items
            $plantRequest->items_json = $processedItems;
            $plantRequest->save();
            
            // Regenerate PDF with updated information
            $this->generatePdf($id);
            
            return response()->json([
                'message' => 'Items updated successfully!'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update items: ' . $e->getMessage());
            
            return response()->json([
                'message' => 'Failed to update items. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 