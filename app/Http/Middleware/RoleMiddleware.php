<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            // Return JSON for API requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthenticated'
                ], 401);
            }
            return redirect('login');
        }

        $user = Auth::user();

        // Check if user role is allowed
        if (!in_array($user->role, $roles)) {
            // Return JSON for API requests
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Akses ditolak. Halaman ini hanya untuk ' . implode(', ', $roles)
                ], 403);
            }
            abort(403, 'Akses ditolak. Halaman ini hanya untuk ' . implode(', ', $roles));
        }

        return $next($request);
    }
}
