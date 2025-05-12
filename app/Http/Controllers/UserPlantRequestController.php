<?php

namespace App\Http\Controllers;

use App\Models\PlantRequest;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class UserPlantRequestController extends Controller
{
    /**
     * Display the form for users to request plants.
     */
    public function create()
    {
        $plants = Plant::all();
        return view('user.plant-request.create', compact('plants'));
    }

    /**
     * Show the plant selection interface for users.
     */
    public function selectPlants()
    {
        $plants = Plant::all();
        return view('user.plant-request.select-plants', compact('plants'));
    }

    /**
     * Store a new plant request from a user.
     */
    public function store(Request $request)
    {
        try {
            Log::info('Received user plant request: ' . json_encode($request->all()));
            
            // Validate the request
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'message' => 'nullable|string|max:1000',
                'items_json' => 'required|string',
                'preferred_delivery_date' => 'nullable|date',
                'agree_to_terms' => 'required|accepted',
            ]);
            
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            // Create new plant request
            $plantRequest = new PlantRequest();
            $plantRequest->email = $request->email;
            $plantRequest->name = $request->name;
            $plantRequest->phone = $request->phone;
            $plantRequest->address = $request->address;
            $plantRequest->message = $request->message;
            $plantRequest->request_date = now();
            $plantRequest->due_date = $request->preferred_delivery_date ?? now()->addDays(14);
            $plantRequest->items_json = json_decode($request->items_json, true);
            $plantRequest->pricing = 'None'; // User requests don't include pricing
            $plantRequest->status = 'pending';
            $plantRequest->request_type = 'user'; // Mark this as a user request vs partner RFQ
            $plantRequest->save();
            
            // Generate PDF
            $this->generateUserRequestPdf($plantRequest->id);
            
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Your plant request has been submitted successfully!',
                    'request_id' => $plantRequest->id
                ]);
            }
            
            return redirect()->route('user.plant-request.success', $plantRequest->id)
                ->with('success', 'Your plant request has been submitted successfully!');
                
        } catch (\Exception $e) {
            Log::error('Failed to process user plant request: ' . $e->getMessage());
            
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'An error occurred while processing your request. Please try again.',
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return back()->with('error', 'An error occurred while processing your request. Please try again.');
        }
    }

    /**
     * Generate PDF for user plant request
     */
    protected function generateUserRequestPdf($id)
    {
        try {
            $request = PlantRequest::findOrFail($id);
            
            // Create PDF
            $pdf = PDF::loadView('pdf.user-request', compact('request'));
            
            // Save PDF
            $filename = 'user_request_' . $id . '.pdf';
            $path = 'pdfs/' . $filename;
            
            Storage::put($path, $pdf->output());
            
            // Update plant request with PDF path
            $request->pdf_path = $path;
            $request->save();
            
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to generate user request PDF: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Show success page after submission
     */
    public function success($id)
    {
        $request = PlantRequest::findOrFail($id);
        return view('user.plant-request.success', compact('request'));
    }

    /**
     * Display all user plant requests (admin view)
     */
    public function adminIndex()
    {
        // Only show requests with type 'user'
        $userRequests = PlantRequest::where('request_type', 'user')
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('admin.requests.user-requests', compact('userRequests'));
    }
    
    /**
     * View details of a specific user request
     */
    public function viewRequest($id)
    {
        $request = PlantRequest::findOrFail($id);
        
        if ($request->request_type !== 'user') {
            return redirect()->route('requests.index')
                ->with('error', 'This is not a user plant request.');
        }
        
        return view('admin.requests.user-request-detail', compact('request'));
    }

    /**
     * Download the generated PDF
     */
    public function downloadPdf($id)
    {
        $request = PlantRequest::findOrFail($id);
        
        if (!$request->pdf_path || !Storage::exists($request->pdf_path)) {
            $this->generateUserRequestPdf($id);
            $request->refresh();
        }
        
        return Storage::download($request->pdf_path, 'plant_request_' . $id . '.pdf');
    }
}
