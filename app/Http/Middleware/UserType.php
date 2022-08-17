<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserType
{
    
    public function handle(Request $request,  Closure $next, String $user_type)
    {
        if (!Auth::check()){return redirect('/home');}
    
        $user = Auth::user();
        if ($user->user_type == $user_type){return $next($request);}

        return redirect('home')->with('error','You have not admin access');
    }
}
