<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Seller;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $isSeller  = false;
            $user = Auth::user();
            //dd(Auth::user()->id);
            $user_roles = UserRole::where('sid', $user->id)->get();
            foreach ($user_roles as $user_role) {
                $actualRole = Role::select('roleName')->where('id', $user_role->rid)->first();
               // dd($actualRole);
                if ($actualRole->roleName == 'Seller') {
                    $isSeller = true;
                    
                    break;
                }

            }
            if ($isSeller == true) {

                return $next($request);
            } else {
                return redirect('/warn')->with('message', 'Access Denied');
                //return $next($request);
            }


        }else {
            return redirect('/warn')->with('message', 'Access Denied');
            
           // return $next($request);
        }

    }

}

