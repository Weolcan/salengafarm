<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\PlantRequest;
use Illuminate\Support\Facades\Log;

class RequestFormController extends Controller
{
    /**
     * Display the request form page
     */
    public function index()
    {
        return view('user.request-form');
    }
    
    /**
     * Submit the request form
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'plants' => 'required|array',
            'plants.*.id' => 'required|exists:plants,id',
            'plants.*.quantity' => 'required|integer|min:1',
            'plants.*.height' => 'nullable|numeric',
            'plants.*.spread' => 'nullable|numeric',
            'plants.*.spacing' => 'nullable|numeric',
        ]);
        
        // Get plant details
        $plantData = [];
        foreach ($validated['plants'] as $index => $plant) {
            $plantModel = Plant::find($plant['id']);
            if ($plantModel) {
                $plantData[] = [
                    'id' => $plantModel->id,
                    'name' => $plantModel->name,
                    'code' => $plantModel->code ?? 'N/A',
                    'quantity' => $plant['quantity'],
                    'height' => $plant['height'] ?? $plantModel->height_mm,
                    'spread' => $plant['spread'] ?? $plantModel->spread_mm,
                    'spacing' => $plant['spacing'] ?? $plantModel->spacing_mm,
                ];
            }
        }
        
        // Now SAVE the request to the database
        try {
            Log::info('Saving new plant request', ['user' => $validated['name'], 'email' => $validated['email']]);
            
            $plantRequest = new PlantRequest();
            $plantRequest->name = $validated['name'];
            $plantRequest->email = $validated['email'];
            $plantRequest->phone = $validated['contact_number']; // Save as phone since that's the field in the database
            $plantRequest->request_date = now();
            $plantRequest->due_date = now()->addDays(14);
            $plantRequest->items_json = $plantData;
            $plantRequest->status = 'pending';
            $plantRequest->request_type = 'user'; // Set the request_type to 'user'
            $plantRequest->save();
            
            Log::info('Plant request saved successfully', ['id' => $plantRequest->id]);
        } catch (\Exception $e) {
            Log::error('Failed to save plant request', ['error' => $e->getMessage()]);
            
            // If AJAX request, return error response
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to save your request. Please try again.'
                ], 500);
            }
            
            return back()->with('error', 'Failed to save your request. Please try again.');
        }
        
        // For AJAX requests, return JSON response
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Your plant request has been submitted successfully.'
            ]);
        }
        
        // Store the request data in session for the confirmation view
        session()->flash('request_data', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'plants' => $plantData,
            'created_at' => now()->format('Y-m-d H:i:s'),
        ]);
        
        // Redirect to a confirmation page with the same format
        return redirect()->route('request-form.confirmation');
    }

    /**
     * Display the confirmation page
     */
    public function confirmation()
    {
        // Check if request data exists in session
        if (!session('request_data')) {
            return redirect()->route('home');
        }
        
        $requestData = session('request_data');
        
        return view('user.request-confirmation', [
            'requestData' => $requestData
        ]);
    }
} 