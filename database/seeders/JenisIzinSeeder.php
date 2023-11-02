<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisIzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\JenisIzin::create([
            'nama_izin' => 'Perizinan',
        ]);
        \App\Models\JenisIzin::create([
            'nama_izin' => 'Non Perizinan',
        ]);
    }
}
