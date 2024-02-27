<?php

namespace App\Models;

use Carbon\Carbon;
use Kirschbaum\PowerJoins\PowerJoins;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permohonan extends Model
{
    use HasFactory, PowerJoins;

    protected $fillable = [
        'perizinan_id',
        'user_id',
        'status_permohonan_id',
        'catatan',
        'catatan_back_office',
        'no_surat_permohonan',
        'tgl_surat_permohonan',
        'no_permintaan_rekomendasi',
        'surat_rekomendasi',
        'no_surat_rekomendasi',
        'tgl_surat_rekomendasi',
        'izin_terbit',
        'tgl_izin_terbit',
        'no_izin',
        'front_office',
        'back_office',
        'opd_teknis',
        'verifikator_1',
        'verifikator_2',
        'kepala_dinas',
    ];

    public function type_rpk() {
        return $this->morphMany(TypeRpk::class, 'type_rpkable');
    }
    public function penelitian() {
        return $this->morphMany(Penelitian::class, 'penelitianable');
    }
    public function peneliti() {
        return $this->morphMany(Peneliti::class, 'penelitiable');
    }
    public function berkas() {
        return $this->morphMany(Berkas::class, 'berkasable');
    }
    public function status_berkas() {
        return $this->morphMany(StatusBerkas::class, 'status_berkasable');
    }
    public function ket_berkas() {
        return $this->morphMany(KetBerkas::class, 'ket_berkasable');
    }
    public function profile() {
        return $this->belongsTo(Profile::class, 'user_id');
    }
    public function status_permohonan() {
        return $this->belongsTo(StatusPermohonan::class, 'status_permohonan_id');
    }
    public function perizinan(){
        return $this->belongsTo(Perizinan::class, 'perizinan_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function front_office(){
        return $this->belongsTo(User::class, 'front_office');
    }
    public function back_office(){
        return $this->belongsTo(User::class, 'back_office');
    }
    public function opd_teknis(){
        return $this->belongsTo(User::class, 'opd_teknis');
    }
    public function verifikator_1(){
        return $this->belongsTo(User::class, 'verifikator_1');
    }
    public function verifikator_2(){
        return $this->belongsTo(User::class, 'verifikator_2');
    }
    public function kepala_dinas(){
        return $this->belongsTo(User::class, 'kepala_dinas');
    }    

    
    public function getTglIzinTerbitAttribute()
    {
        if (isset($this->attributes['tgl_izin_terbit']) && !empty($this->attributes['tgl_izin_terbit'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_izin_terbit'])->format('d-m-Y');
        } else {
            return null;
        }
    }

    public function setTglSuratPermohonanAttribute($value)
    {
        $this->attributes['tgl_surat_permohonan'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTglSuratPermohonanAttribute()
    {
        if (isset($this->attributes['tgl_surat_permohonan']) && !empty($this->attributes['tgl_surat_permohonan'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_surat_permohonan'])->format('d-m-Y');
        } else {
            return null;
        }
    }


    public function setTglSuratRekomendasiAttribute($value)
    {
        $this->attributes['tgl_surat_rekomendasi'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function getTglSuratRekomendasiAttribute()
    {
        if (isset($this->attributes['tgl_surat_rekomendasi']) && !empty($this->attributes['tgl_surat_rekomendasi'])) {
            return Carbon::createFromFormat('Y-m-d', $this->attributes['tgl_surat_rekomendasi'])->format('d-m-Y');
        } else {
            return null;
        }
    }

}

