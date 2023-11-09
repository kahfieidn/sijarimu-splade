<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perizinan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama_perizinan',
        'sektor_id',
        'jenis_izin_id',
        'status'
    ];

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }
    
}
