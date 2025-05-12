/**
 * Register the exception handling callbacks for the application.
 */
public function register(): void
{
    $this->reportable(function (Throwable $e) {
        //
    });
    
    // Add special handling for view rendering errors in request views
    $this->renderable(function (Throwable $e, $request) {
        if ($request->is('requests/view/*')) {
            \Illuminate\Support\Facades\Log::error('Request view error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'url' => $request->url()
            ]);
            
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => 'Failed to render request view: ' . $e->getMessage()
                ], 500);
            }
            
            return response()->view('errors.request-view', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    });
} 