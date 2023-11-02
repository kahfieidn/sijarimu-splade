<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_perizinan',
        'sektor_id',
        'jenis_izin_id',
        'status'
    ];
    
}
