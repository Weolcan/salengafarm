<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('AdminMiddleware is being executed');

        if (!Auth::check()) {
            Log::info('User is not authenticated');
            return redirect()->route('login');
        }

        if (!Auth::user()->isAdmin()) {
            Log::info('User is not an admin');
            return redirect()->route('user.dashboard');
        }

        Log::info('User is an admin, proceeding with request');
        return $next($request);
    }
} 