<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'npwp',
        'npwp_file',
        'perusahaan',
        'alamat',
        'domisili',
        'provinsi_domisili',
        'nib',
        'nib_file',
        'user_id',
    ];
}
