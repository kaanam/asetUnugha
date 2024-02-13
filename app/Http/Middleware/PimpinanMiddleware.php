<?php

namespace App\Http\Middleware;

use Closure;

class PimpinanMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check apakah pengguna adalah pimpinan
        if (auth()->check() && auth()->user()->role == 'pimpinan') {
            return $next($request);
        }

        // Jika bukan pimpinan, redirect atau lakukan aksi lainnya
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
