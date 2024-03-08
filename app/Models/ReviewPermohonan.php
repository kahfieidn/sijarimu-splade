<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPermohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'review_permohonanable_id',
        'review_permohonanable_type',
        'front_office',
        'back_office_1',
        'back_office_2',
        'back_office_3',
        'opd',
        'back_office_4',
        'back_office_5',
        'back_office_6',
        'kepala_dinas',
    ];

    public function review_permohonanable_id()
    {
        return $this->morphTo();
    }

    public function front_office(){
        return $this->belongsTo(User::class, 'front_office');
    }
    public function back_office_1(){
        return $this->belongsTo(User::class, 'back_office_1');
    }
    public function back_office_2(){
        return $this->belongsTo(User::class, 'back_office_2');
    }
    public function back_office_3(){
        return $this->belongsTo(User::class, 'back_office_3');
    }
    public function opd(){
        return $this->belongsTo(User::class, 'opd');
    }
    public function back_office_4(){
        return $this->belongsTo(User::class, 'back_office_4');
    }
    public function back_office_5(){
        return $this->belongsTo(User::class, 'back_office_5');
    }
    public function back_office_6(){
        return $this->belongsTo(User::class, 'back_office_6');
    }
    public function kepala_dinas(){
        return $this->belongsTo(User::class, 'kepala_dinas');
    }

}
