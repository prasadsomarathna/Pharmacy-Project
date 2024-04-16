<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }

    public function user()
        {
            //return 'name';
            return $this->username;
        }

        public function redirectTo(){
            $CurrUser=Auth::user()->username;

		$UserStatus = Auth::user()->Active;

            $CurrDateTime = date("Y-m-d H:i:s");

            // User role
            $role = Auth::user()->admin; 


            $clientIP = request()->ip();
            

            DB::table('IPaddrLog')->insert([
                'IP' => $clientIP,
                'User' => $CurrUser,
                'SysDateTime' => $CurrDateTime,
		'Status' => $UserStatus,
            ]);

	if($UserStatus==0){
		$this->redirectTo = '/logout';
                return $this->redirectTo; 
	}else{

            $GetResetStatus = DB::table('users')->where([ ['ResetPwd', 1],['Active', 1],['username',$CurrUser] ])->count();
            //Log::info($GetResetStatus);
		//print_r($GetResetStatus);
            if(($GetResetStatus != 1) && ($role !='2' && $role !='5')){

                //$this->redirectTo = '/change-password';
		//if($UserStatus==1){
                    $this->redirectTo = '/change-password';
                //}else{
                   // $this->redirectTo = '/Cashier/Cashiering';
               // }
                return $this->redirectTo;   

            }else{
                    // Check user role
                    switch ($role) {
                        case '0':
                            $this->redirectTo = '/';
                            return $this->redirectTo;
                            break;

                        case '1':
                            $this->redirectTo = '/SalesCenter';
                            return $this->redirectTo;    
                            break;
                            
                        case '2':
                            $this->redirectTo = '/Steward_Billing';
                            return $this->redirectTo;                           
                            break; 

                        case '3':
                            $this->redirectTo = '/Cashier/Cashiering';
                            return $this->redirectTo;                       
                            break;

                        case '4':
                            $this->redirectTo = '/Discount/discount';
                            return $this->redirectTo;                           
                            break;

                        case '5':
                            $this->redirectTo = '/RidersApp';
                            return $this->redirectTo;                           
                            break;

                        case '6':
                            $this->redirectTo = '/';
                            return $this->redirectTo;
                            break;    

                        case '7':
                            $this->redirectTo = '/SalesCenterMaqara';
                            return $this->redirectTo;
                            break;   

                        case '8':
                            $this->redirectTo = '/Makara_System';
                            return $this->redirectTo;
                            break;

                        case '8':
                            $this->redirectTo = '/Makara_System';
                            return $this->redirectTo;
                            break;             
 
                         case '9':
                            $this->redirectTo = '/SalesCenterDubai';
                            return $this->redirectTo;
                            break; 


                         case '10':
                            $this->redirectTo = '/Steward_Billing_Dubai';
                            return $this->redirectTo;
                            break; 


                         case '11':
                            $this->redirectTo = '/CashierDXB/Cashiering_Dubai';
                            return $this->redirectTo;
                            break; 

                         case '12':
                            $this->redirectTo = '/';
                            return $this->redirectTo;
                            break; 


                        default:
                            $this->redirectTo = '/login';
                            return $this->redirectTo;                      
                            break;
                    }

		}

            }    
            

            
        }


}
