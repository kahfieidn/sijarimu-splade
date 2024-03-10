<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function front_office_user(){
        return $this->belongsTo(User::class, 'front_office');
    }
    public function back_office_1_user(){
        return $this->belongsTo(User::class, 'back_office_1');
    }
    public function back_office_2_user(){
        return $this->belongsTo(User::class, 'back_office_2');
    }
    public function back_office_3_user(){
        return $this->belongsTo(User::class, 'back_office_3');
    }
    public function opd_user(){
        return $this->belongsTo(User::class, 'opd');
    }
    public function back_office_4_user(){
        return $this->belongsTo(User::class, 'back_office_4');
    }
    public function back_office_5_user(){
        return $this->belongsTo(User::class, 'back_office_5');
    }
    public function back_office_6_user(){
        return $this->belongsTo(User::class, 'back_office_6');
    }
    public function kepala_dinas_user(){
        return $this->belongsTo(User::class, 'kepala_dinas');
    }

}
