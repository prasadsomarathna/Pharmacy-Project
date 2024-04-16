<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\SalesCenterModel\MainMenu;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function insert(Request $req){

        //  $Input_ContactNo = $req->input('Input_ContactNo');
        //  //$Input_ContactNo="53";
        //  echo "$Input_ContactNo";
        // $data =array('conatctno'=>$Input_ContactNo);
        //  DB::table('order')->insert($data);

        //  echo "Success";
    }
}
