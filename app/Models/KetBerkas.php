<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetBerkas extends Model
{
    use HasFactory;

    protected $fillable =[
        'ket_berkasable_id',
        'ket_berkasable_type',
        'field_1',
        'field_2',
        'field_3',
        'field_4',
        'field_5',
        'field_6',
        'field_7',
        'field_8',
        'field_9',
        'field_10',
        'field_11',
        'field_12',
        'field_13',
        'field_14',
        'field_15',
        'field_16',
        'field_17',
        'field_18',
        'field_19',
        'field_20',
        'field_21',
        'field_22',
        'field_23',
        'field_24',
        'field_25',
        'field_26',
        'field_27',
        'field_28',
        'field_29',
        'field_30',
    ];

    public function keterangan_berkas() {
        return $this->morphMany(KetBerkas::class, 'ket_berkasable');
    }
}
