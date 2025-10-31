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
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        // Cek apakah role user termasuk yang diizinkan
        if (!in_array($user->role, $roles)) {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk ' . implode(', ', $roles));
        }

        return $next($request);
    }
}
