<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSessionActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lastActivity = Session::get('lastActivity');
        $timeout = config('session.lifetime') * 60;

        if ($lastActivity && (time() - $lastActivity) > $timeout) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('message', 'Sesión expirada por inactividad.');
        }

        Session::put('lastActivity', time());

        return $next($request);
    }
}
