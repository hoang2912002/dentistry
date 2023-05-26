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
        $arrRoles = ['admin','doctor','bac-si'];
        if(Auth::check()){
            $arrRoleUser = [Auth::user()->User->group_user[0]->slug];
            foreach($arrRoles as $arrRole){ 
                if(in_array($arrRole,$arrRoleUser)){
                    return $next($request);
                }
            }
            return $next($request);
        }
        else{
            return redirect()->route('admin.login');
        }
        
    }
}
