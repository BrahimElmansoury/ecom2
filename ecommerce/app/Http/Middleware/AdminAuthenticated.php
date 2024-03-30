<?php

namespace App\Http\Middleware; // Update the namespace

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $user=Auth::user();
            if($user->isAdmin())
            {
                return $next($request);
            }else
            {
                return redirect(route('editor_dashboard'));
            }
        }
        abort(403);//non autorise acces suelemtn les admins
    }
}
 