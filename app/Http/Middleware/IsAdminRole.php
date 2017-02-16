<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminRole
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
        // Semak sekiranya user yang tengah cuba akses ke
        // halaman yang dipohon mempunyai status admin
        // Jika tiada, redirect ke halaman home
        if ( ! $request->user()->isAdmin() ){
          return redirect('home');
        }
        // Jika ada, redirect ke halaman yang ingin dibuka
        return $next($request);
    }
}
