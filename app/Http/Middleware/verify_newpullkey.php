<?php

namespace App\Http\Middleware;

use Closure;

class verify_newpullkey
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
        //PTP and VP category of pull require subkeys, in pull_categories table id of VP=1 & id of PTP=2
        if($request->main_key->category_id<3){
          if($request->sub_keys==null)
            abort(408, "Subkeys can't be empty");
        }
        return $next($request);
    }
}
