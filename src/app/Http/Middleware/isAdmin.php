<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class isAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{

		if(Auth::user()->is_admin == 0){

			return redirect()->back()->with('warning', 'Estas intentando acceder a una sección restringida');

		}

		return $next($request);
	}

}
