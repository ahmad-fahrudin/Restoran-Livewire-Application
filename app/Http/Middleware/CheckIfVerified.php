<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->is_verified) {
            return redirect()->route('verify.email')->with('error', 'Silakan verifikasi email Anda terlebih dahulu.');
        }

        return $next($request);
    }
}
