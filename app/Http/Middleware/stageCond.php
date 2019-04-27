<?php

namespace App\Http\Middleware;

use Closure;

class stageCond
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
       if( $request->input('user_id') == null ){
         return redirect('/stages/create');
       }
       elseif( $request->input('part_id') == null ){
         return redirect('/stages/create');
       }
        return $next($request);
    }
}
