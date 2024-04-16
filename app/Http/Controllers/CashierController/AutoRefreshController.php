<?php

namespace App\Http\Controllers\CashierController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

//use Illuminate\Http\Request; 
use Carbon\Carbon;

use App\Models\CashierModel\Customer;



class AutoRefreshController extends Controller
{
    
	
    public function index(){

		$Customer = Customer::withoutTrashed()->get();
		
		return response()->json([
			'status' => 200,
			'Customer' => $Customer
		],200);

    }
}
