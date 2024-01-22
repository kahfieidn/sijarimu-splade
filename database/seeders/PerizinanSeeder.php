<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerizinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Izin Penelitian (Untuk: Mahasiswa)',
            'sektor_id' => '1',
            'jenis_izin_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Izin Penelitian (Untuk: Perorangan)',
            'sektor_id' => '1',
            'jenis_izin_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Izin Penelitian (Untuk: Lembaga / Instansi / Perusahaan)',
            'sektor_id' => '1',
            'jenis_izin_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Persetujuan Rencana Pengoperasian Kapal pada Trayek Tidak Tetap dan Tidak Teratur Angkutan Laut Dalam Negeri',
            'sektor_id' => '2',
            'jenis_izin_id' => '1',
            'status' => 'active',
        ]);
    }
}
