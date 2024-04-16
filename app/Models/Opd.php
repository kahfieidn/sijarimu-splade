<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sektor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sektor_id',
        'role_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function sektor(){
        return $this->belongsTo(Sektor::class, 'sektor_id');
    }

}
