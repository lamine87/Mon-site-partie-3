<?php

namespace App\Http\Middleware;

use Closure;

class CheckBannir
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

        if (auth()->check() && auth()->user()->bannir_user && now()->lessThan(auth()->user()->bannir_user)) {
            $banned_days = now()->diffInDays(auth()->user()->bannir_user);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Votre compte a été suspendu. S\'il vous plaît contacter l\'administrateur.';
            } else {
                $message = 'Votre compte a été suspendu pour'.$banned_days.' '.Str :: plural ()('day', $banned_days).'. S\'il vous plaît contacter l\'administrateur.';
            }

            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}

