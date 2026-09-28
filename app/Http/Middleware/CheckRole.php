<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Mengecek apakah user sudah login dan apakah rolenya sesuai dengan yang diizinkan
        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            // Mengembalikan tampilan view kustom 'errors.403' dengan status code 403
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}