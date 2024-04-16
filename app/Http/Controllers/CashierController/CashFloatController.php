<?php

namespace App\Http\Controllers\CashierController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use App\Models\CashierModel\Customer;



class CashFloatController extends Controller
{
    
   protected $CurrentDate,$curtime,$CurrDateTime;
    private $CurrUser,$Branch ;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->CurrUser = Auth::user()->username;
            $this->Branch = Auth::user()->outlet;

            return $next($request);
        });

        $this->CurrentDate = date('Y-m-d');
        $this->curtime = date("H:i:s");
        $this->CurrDateTime = date("Y-m-d H:i:s");
        

    }
	
    public function index(){

        //$userAccsess = "WAT";
        $dt = Carbon::now();
        $dayOfToday = $dt->format('Y-m-d');
        //$dayOfToday = "2020-11-10";
        $dayOfRiderOut = $dt->format('Y-m-d H:i:s');

        //Get Today Cash float assign to rider
        $getCashAmountinCF = Customer::withTrashed()->get();

        return view('Cashier/riderDailyCashFloat',[
            'getCashAmountinCF' => $getCashAmountinCF
        ]);

    }

    public function cashFloatDataStore (Request $request){

        if($request->post('cusName') != ''){
            Customer::insert([
                'Name' => $request->post('cusName'),
                'Contact' => $request->post('cusContact'),
                'Address' => $request->post('cusAddress')
            ]);
        }else{
            echo "Sorry";
        }

        return redirect()->back();
        
    }
}
