<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPrivilege
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedPrivileges = ['admin', 'user'];

        // Cek apakah pengguna memiliki privilege yang diperlukan
        if (!in_array($request->user()->privilege, $privileges)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
