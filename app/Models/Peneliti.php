<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peneliti extends Model
{
    use HasFactory;

    protected $fillable = [
        'penelitiable_id',
        'penelitiable_type',
        'jenis_identitas',
        'no_identitas',
        'nama',
        'jabatan_peneliti',
    ];

    public function penelitiable()
    {
        return $this->morphTo();
    }

    

}
