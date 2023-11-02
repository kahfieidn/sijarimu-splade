<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Ditolak',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Revisi',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Front Office',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Back Office (1)',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Back Office (2)',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan OPD Teknis',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Verifikator 1',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Verifikator 2',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Menunggu Tinjauan Kepala Dinas',
        ]);
        \App\Models\StatusPermohonan::create([
            'nama_status' => 'Selesai',
        ]);
    }
}
