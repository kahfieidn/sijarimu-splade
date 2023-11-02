<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penelitian extends Model
{
    use HasFactory;

    protected $fillable = [
        'penelitianable_id',
        'penelitianable_type',
        'nomor',
        'menimbang',
        'nim',
        'universitas',
        'jurusan',
        'jenjang',
        'judul_penelitian',
        'lokasi_penelitian',
        'lembaga',
        'waktu_awal_penelitian',
        'waktu_akhir_penelitian',
    ];

    public function penelitianable()
    {
        return $this->morphTo();
    }


    

}
