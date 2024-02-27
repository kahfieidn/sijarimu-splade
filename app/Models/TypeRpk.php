<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeRpk extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_rpkable_id',
        'type_rpkable_type',
        'type_trayek',
        'type_rpk',
        'type_gt',
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
        'nomor_siupper',
        'tgl_siupper',
        'nomor_rpk_sebelumnya',
        'tgl_rpk_sebelumnya'

    ];

    public function type_rpkable()
    {
        return $this->morphTo();
    }

    
    public function setTglSiupperAttribute($value)
    {
        $this->attributes['tgl_siupper'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTglSiupperAttribute()
    {
        if (isset($this->attributes['tgl_siupper']) && !empty($this->attributes['tgl_siupper'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_siupper'])->format('d-m-Y');
        } else {
            return null;
        }
    }

    public function setTglRpkSebelumnyaAttribute($value)
    {
        $this->attributes['tgl_rpk_sebelumnya'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTglRpkSebelumnyaAttribute()
    {
        if (isset($this->attributes['tgl_rpk_sebelumnya']) && !empty($this->attributes['tgl_rpk_sebelumnya'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_rpk_sebelumnya'])->format('d-m-Y');
        } else {
            return null;
        }
    }
    
    

}
