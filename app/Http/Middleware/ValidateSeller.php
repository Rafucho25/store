<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use DB;

class ValidateSeller
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
        /*TODO: Eliminar funcion comentada*/
        /*$storeId = DB::table('stores')->where('id',$request->route()->parameter('id'))->first();

        if (!Sentinel::inRole('seller')) {
            return redirect('/')->with('messageDanger', 'Usted no es vendedor, para poder vender tiene que activar su cuenta como vendedor');
        }elseif ($storeId->user_id == Sentinel::getUser()->id){
            return $next($request);
        }else{
            return redirect('/')->with('messageDanger', 'Esta no es su tienda, favor verificar');
        }*/

        if (!Sentinel::inRole('seller')) {
            return redirect('/')->with('messageDanger', 'Usted no es vendedor, para poder vender tiene que activar su cuenta como vendedor');
        }else{
            return $next($request);
        }

    }
}
