<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !$request->user()->hasClientAccess()) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized. Client access required.'], 403);
            }
            
            return redirect()->route('user.plant-request.create')
                ->with('error', 'You do not have access to the Request for Quotation (RFQ) feature. Please use the regular plant request form.');
        }
        
        return $next($request);
    }
}
