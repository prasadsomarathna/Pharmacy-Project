<?php

namespace App\Models\CashierModel;

use Illuminate\Database\Eloquent\Model;

class RiderSkimming extends Model
{
    
    protected $table = 'RiderSkimming';
    protected $fillable = ['id','riderCode','Outlet','userName','skimmingAmount','skimmingDate','updated_at','created_at'];
    protected $primaryKey = 'id'; 
}
