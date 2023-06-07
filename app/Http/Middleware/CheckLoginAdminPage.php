<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginAdminPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //DD(Auth::user()->User->group_user[0]->slug);
        $arrRoles = ['admin','doctor','bac-si'];
        if(Auth::check()){
            $arrRoleUser = [Auth::user()->User->group_user[0]->slug];
                if(in_array($arrRoleUser[0],$arrRoles)){
                    return $next($request);
                }
            return $next($request);
        }
        else{
            return redirect()->route('admin.login');
        }
        
    }
}
