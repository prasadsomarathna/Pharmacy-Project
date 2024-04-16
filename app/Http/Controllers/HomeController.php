<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('home');
    }

    public function AllLinks()
    {
        return view('auth.AdminDashboard');
    }

    public function logout () {
        //logout user
        auth()->logout();
        //Auth::guard('admin')->logout();
        // redirect to homepage
        
        return redirect('login');
    }

}
