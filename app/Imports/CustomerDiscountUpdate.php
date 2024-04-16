<?php

namespace App\Imports;

use App\Models\MasterFiles\CustomerUpdateData;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerDiscountUpdate implements ToModel
{
    
    public function model(array $row)
    {
        return new CustomerUpdateData([
            'ContactNo'=> $row[0],
            'DiscountCode'=> $row[1],
        ]);
    }
}
