<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbversion extends Model
{
    use HasFactory;
    protected $fillable = [
        'version', 'path','updated_by'
    ];
    protected $hidden = ['id','created_at','updated_at'];
}
