<?php

namespace App\Models\CashierModel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    //
	
	use SoftDeletes;
	
    protected $table = 'Customer';
	
    protected $fillable = ['ID', 'Name', 'Contact', 'Address', 'deleted_at'];
    protected $primaryKey = 'ID'; 
	
	
    public $incrementing = false;
	
	public $timestamps = false;
}
