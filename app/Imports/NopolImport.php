<?php

namespace App\Imports;

use App\Models\Vehicle_number;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NopolImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Vehicle_number([
           'nopol'              => $row['nopol'],
           'model_kendaraan'    => $row['model_kendaraan'],
        ]);
    }
}