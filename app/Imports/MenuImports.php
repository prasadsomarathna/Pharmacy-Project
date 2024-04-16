<?php

namespace App\Imports;
use App\Models\MasterFiles\PriceUpdate;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImports implements ToModel
{
    
    // protected $table = 'PriceUpdate';
    // protected $fillable = ['MenuCode','Price'];
    // protected $primaryKey = 'MenuCode';

    public function model(array $row)
    {
        return new PriceUpdate([
            'MenuCode'=> $row[0],
            'Price'=> $row[1],

        ]);
    }
}
