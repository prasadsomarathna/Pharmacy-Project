<?php

namespace App\Models\CashierModel;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    //
    use SoftDeletes;
	
    protected $table = 'Medication';
	
    protected $fillable = ['ID', 'Name', 'Description', 'Quantity', 'deleted_at'];
    protected $primaryKey = 'ID'; 
	
	
    public $incrementing = false;
	
	public $timestamps = false;
}
