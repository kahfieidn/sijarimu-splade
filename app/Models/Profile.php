<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'npwp',
        'perusahaan',
        'alamat',
        'domisili',
        'provinsi_domisili',
        'user_id',
    ];
}
