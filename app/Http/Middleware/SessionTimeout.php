<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            $lastActivity = Session::get('last_activity_time');
            $now = Carbon::now();

            if($lastActivity !== null && $now->diffInMinutes(Carbon::parse($lastActivity)) > config('session.lifetime')) {
                Auth::logout();
                Session::flush();

                return redirect('/')->with('message', 'Kamu Logout Karna Tidak Ada Aktifitas.');
            }
            Session::put('last_activity_time', $now);

        }
        return $next($request);
    }
}
