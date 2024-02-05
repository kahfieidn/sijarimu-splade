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
        'surat_rekomendasi',
        'bap',
        'izin_terbit',
        'no_izin',
        'no_rekom',
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

}

