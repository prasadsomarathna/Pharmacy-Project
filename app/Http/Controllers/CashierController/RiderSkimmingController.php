<?php

namespace App\Http\Controllers\CashierController;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Models\CashierModel\Medication;



class RiderSkimmingController extends Controller
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

        //$userAccsess = "MIL";
        $dt = Carbon::now();
        $dayOfToday = $dt->format('Y-m-d');
        //$dayOfToday = "2020-11-20";
        $dayOfRiderOut = $dt->format('Y-m-d H:i:s');


        $getSkimmingRiders = Medication::withTrashed()->get();



        return view('Cashier/riderSkimming',[
            'getSkimmingRiders' => $getSkimmingRiders
        ]);

    }

    public function skimmingDataStore (Request $request){
        
        $Medication = new Medication;

        $Medication->Name = $request->post('medName');
        $Medication->Description = $request->post('medDescription');
        $Medication->Quantity = $request->post('medQuantity');

        $Medication->save();
        return redirect()->back();

    }

}
