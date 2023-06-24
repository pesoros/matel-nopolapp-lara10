<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_number extends Model
{
    use HasFactory;
    protected $connection = 'sqlite';
    protected $table = 'vehicle_number';
    protected $fillable = [
        'nopol', 
        'unit',
        'finance',
        'cabang',
        'no_rangka',
        'no_mesin',
        'tahun',
        'warna',
        'overdue',
        'saldo',
        'nama',
    ];
    protected $hidden = ['id','created_at','updated_at'];
}
