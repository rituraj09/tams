<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfSchool
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'school')
	{
	   /* if (Auth::guard($guard)->check()) {  
			$setpwd = Auth::guard($guard)->user()->set_password;
			if($setpwd==0)
			{
				return redirect('school/setpassword');
			} 
			else{
				return redirect('school/home');
			}
	    }*/
		if (Auth::guard($guard)->check()) {
	        return redirect('school/home');
	    }
	    return $next($request);
	}
}