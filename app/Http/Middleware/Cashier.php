<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
//use Illuminate\Support\Facades\Auth;
class Cashier
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
            return $next($request);
        }

        //role 4 = marketing
        if(Auth::user()->admin == 4){
            return redirect()->route('marketing');
        }         
        
        //role 5 = rider
        if(Auth::user()->admin == 5){
            return redirect()->route('rider');
        } 

        //role 7 = MQRAgent
        if(Auth::user()->admin == 7){
            return redirect()->route('MQRAgent');
        } 

        //role 9 = DXBAgent
        if(Auth::user()->admin == 9){
            return redirect()->route('DXBAgent');
        } 

        //role 10 = DXBStuwerd
        if(Auth::user()->admin == 10){
            return redirect()->route('DXBStuwerd');
        } 

        //role 11 = DXBCashier
        if(Auth::user()->admin == 11){
           return redirect()->route('DXBCashier');
        } 

        //role 12 = Mobile Ordering Steward
        if(Auth::user()->admin == 12){
          return redirect()->route('MobileOrderSteward');;
        } 

        //role 13 = Mobile Ordering Steward DXB
        if(Auth::user()->admin == 13){
          return redirect()->route('MobileOrderStewardDXB');;
        } 

    }
}