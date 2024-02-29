<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRpkRoro extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_rpk_roroable_id',
        'type_rpk_roroable_type',
        'type_rpk_roro',
        'nama_kapal',
        'lintas',
        'pemilik_kapal',
        'nomor_siuap'
    ];

    public function type_rpk_roroable()
    {
        return $this->morphTo();
    }
}
