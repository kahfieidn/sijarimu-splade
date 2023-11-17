<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_persyaratan',
        'deskripsi',
        'perizinan_id',
        'status'
    ];
}
