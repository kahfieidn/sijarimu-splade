<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Kesatuan Bangsa & Politik',
        ]);
        \App\Models\Sektor::create([
            'nama_sektor' => 'Sektor Perhubungan',
        ]);
    }
}
