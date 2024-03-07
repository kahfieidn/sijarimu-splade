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

}
