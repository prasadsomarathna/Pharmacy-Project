<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
//use Illuminate\Support\Facades\Auth;
class Marketing
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

        // if (!Auth()->user()->admin == 1) {
        //     abort(403);
        // }

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //role 0 = admin
        if(Auth::user()->admin == 0){
            return redirect()->route('admin');
        }
        
        //role 1 = agent
        if(Auth::user()->admin == 1){
            return redirect()->route('agent');
        }

        //role 2 = steward
        if(Auth::user()->admin == 2){
            return redirect()->route('steward');
        }     

        //role 3 = cashier
        if(Auth::user()->admin == 3){
            return redirect()->route('cashier');
        }

        //role 4 = marketing
        if(Auth::user()->admin == 4){
            return $next($request);
        }         
        
        //role 5 = rider
        if(Auth::user()->admin == 5){
            return redirect()->route('rider');
        } 


                //role 7 = MQRAgent
                if(Auth::user()->admin == 7){
                    return redirect()->route('MQRAgent');
                } 
                 //role 9 = MQRAgent
                if(Auth::user()->admin == 9){
                    return redirect()->route('DXBAgent');
                }  



    }
}