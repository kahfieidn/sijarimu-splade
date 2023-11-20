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
    
    public function penelitian() {
        return $this->morphMany(Penelitian::class, 'penelitianable');
    }

    public function getWaktuAwalPenelitianAttribute(){
        return Carbon::createFromFormat('Y-m-d', $this->attributes['waktu_awal_penelitian'])->format('d-m-Y');
    }

    public function getWaktuAkhirPenelitianAttribute(){
        return Carbon::createFromFormat('Y-m-d', $this->attributes['waktu_akhir_penelitian'])->format('d-m-Y');
    }

    public function setWaktuAwalPenelitianAttribute($value)
    {
        $this->attributes['waktu_awal_penelitian'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    
    public function setWaktuAkhirPenelitianAttribute($value)
    {
        $this->attributes['waktu_akhir_penelitian'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

 

}
