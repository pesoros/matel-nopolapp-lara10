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
            'nopol' => $row['nopol'] ? $row['nopol'] : '',
            'unit' => $row['unit'] ? $row['unit'] : '',
            'finance' => $row['finance'] ? $row['finance'] : '',
            'cabang' => $row['cabang'] ? $row['cabang'] : '',
            'no_rangka' => $row['no_rangka'] ? $row['no_rangka'] : '',
            'no_mesin' => $row['no_mesin'] ? $row['no_mesin'] : '',
            'tahun' => $row['tahun'] ? $row['tahun'] : '',
            'warna' => $row['warna'] ? $row['warna'] : '',
            'overdue' => $row['overdue'] ? $row['overdue'] : '',
            'saldo' => $row['saldo'] ? $row['saldo'] : '',
            'nama' => $row['nama'] ? $row['nopnamaol'] : '',
        ]);
    }
}
