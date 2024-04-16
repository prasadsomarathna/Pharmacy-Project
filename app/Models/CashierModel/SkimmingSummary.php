<?php

namespace App\Models\CashierModel;

use Illuminate\Database\Eloquent\Model;

class SkimmingSummary extends Model
{
    //
    protected $table = 'riderSkimmingSummary';
    protected $fillable = ['riderCode','Outlet','salesAmount','SkimmingAmount','orderCount','toDayDate'];
    protected $primaryKey = 'riderCode'; 

    public $incrementing = false;
	
	
	public $timestamps = false;
}
