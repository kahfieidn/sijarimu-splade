<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRpk extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_rpkable_id',
        'type_rpkable_type',
        'nama_kapal',
        'jenis_kapal',
        'bendera',
        'isi_kotor',
        'tenaga_penggerak',
        'status_kepemilikan_kapal',
        'kapasitas_angkut',
        'pelabuhan_pangkal',
        'pelabuhan_singgah',
        'trayek',
        'urgensi',
        'nomor_siualper',
        'nomor_rpk_sebelumnya',
    ];

    public function type_rpkable()
    {
        return $this->morphTo();
    }


}
