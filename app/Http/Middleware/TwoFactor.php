<?php

namespace App\Http\Middleware;

use Closure;

class TwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (auth()->check() && $user->two_factor_code)  
        {
            // if ($user->two_factor_expires_at->lt(now())) 
            // {
            //     $user->resetTwoFactorCode();
            //     auth()->logout();

            //     return redirect()->route('login', app()->getLocale())->withMessage('Timeout: Two Factor Code is expired. Please login again.');
            // }
            if (!$request->is('verify*')) 
            {
                return redirect()->route('verify.index', app()->getLocale());
            } 
            // return $next($request);
        }

        return $next($request);
    }
}
