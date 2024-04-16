<?php

namespace App\Models\CashierModel;

use Illuminate\Database\Eloquent\Model;

use App\Helpers\ModelMPK;

class CashFloat extends Model
{
    //
    protected $table = 'CashFloat';
    protected $fillable = ['riderCode','Outlet','userName','cFDate','cFAmount','updated_at','created_at'];
    protected $primaryKey = ['riderCode','Outlet','cFDate'];
    
    public $incrementing = false;

    /*public function setOptionsAttribute($options)
    {
        $this->attributes['cFAmount'] = json_encode($options);
        $this->attributes['riderCode'] = json_encode($options);
        $this->attributes['Outlet'] = json_encode($options);
        $this->attributes['userName'] = json_encode($options);
        $this->attributes['cFDate'] = json_encode($options);
    } */

}
