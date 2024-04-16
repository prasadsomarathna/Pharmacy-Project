<?php

namespace App\Http\Controllers\CashierController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; 
use Carbon\Carbon;
use App\Models\CashierModel\Customer;
use App\Models\CashierModel\Medication;



class cashierModuleController extends Controller
{
    protected $CurrentDate,$curtime,$CurrDateTime;
    private $CurrUser,$Branch ;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->CurrUser = Auth::user()->username;
            $this->Role = Auth::user()->admin;
            $this->Outlet = Auth::user()->outlet;

            return $next($request);
        });

        $this->CurrentDate = date('Y-m-d');
        $this->curtime = date("H:i:s");
        $this->CurrDateTime = date("Y-m-d H:i:s");
        
    } 

    public function index(){

        
		if(($this->Outlet == 'MGR') || ($this->Outlet == 'CSH')){
			$closedTableBills2 = Medication::withoutTrashed()
			->select('ID', 'Name', 'Description', 'Quantity', 'deleted_at')
			->get();
		}
		if($this->Outlet == 'OWN'){
			$closedTableBills2 = Medication::withTrashed()->get();
		}
		
		if(($this->Outlet == 'MGR') || ($this->Outlet == 'CSH')){
			$closedTableBills = Customer::withoutTrashed()
			->select('ID', 'Name', 'Contact', 'Address', 'deleted_at')
			->get();
		}
		if($this->Outlet == 'OWN'){
			$closedTableBills = Customer::withTrashed()->get();
		}


        $UserName = $this->CurrUser;
		$Role = $this->Outlet;
        //$dateForMe = Carbon::now()->subDay(1)->format('Y-m-d');
        //$getDayEndDate = $getDayEndDate->format('Y-m-d');

        return view('Cashier/cashiering', [
            'closedTableBills'=>$closedTableBills,
            'closedTableBills2'=>$closedTableBills2,
            'UserName' => $UserName,
            'UserRole' => $Role
        ]);

    }


	//This is for send Sms bill detail in first stage
    public function sendSmsBillInFirstStage(Request $request)
	{
        
        $removeMedication = $request->post('id');
		if($this->Outlet == 'MGR'){
			$updateRemoveMedication = Medication::where('ID', $removeMedication)->update(['deleted_at' => $this->CurrDateTime]);
		}
		if($this->Outlet == 'OWN'){
			$updateRemoveMedication = DB::table('Medication')->where('ID', $removeMedication)->delete();
		}

    }
	
	public function sendSmsBillInFirstStageTwo(Request $request)
	{
        
        $removeCustomer = $request->post('id');
		if($this->Outlet == 'MGR'){
			$updateRemoveCustomer = Customer::where('ID', $removeCustomer)->update(['deleted_at' => $this->CurrDateTime]);
		}
		if($this->Outlet == 'OWN'){
			$updateRemoveCustomer = DB::table('Customer')->where('ID', $removeCustomer)->delete();
		}

    }


}
