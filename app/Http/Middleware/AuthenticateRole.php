<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Check for user role with respective guards
        if ($role === 'user' && Auth::guard('user')->check()) {
            return $next($request);
        }

        if ($role === 'owner' && Auth::guard('owner')->check()) {
            return $next($request);
        }
        if(Auth::guard('owner')->check())
        {
            return redirect()->route('home');
        }
        if(Auth::guard('user')->check())
        {
            return redirect()->route('home_user');
        }
        toast('غير مسموح لك بالدخول لهذة الصفحة','error');
        return redirect()->route('login');
    }
}
