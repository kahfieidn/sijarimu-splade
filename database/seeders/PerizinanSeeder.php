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
            'note' => '<li>Semua berkas harus diisi dengan lengkap.</li>
            <li>Surat Keabsahan Keaslian (dengan materai) dapat ditemukan dalam format yang tidak baku di internet.</li>
            <li>Surat Mentaati Peraturan Perundang-undangan (Bermaterai) dapat ditemukan dalam format yang tidak baku, silakan cari di internet.</li>',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Izin Penelitian (Untuk: Perorangan)',
            'sektor_id' => '1',
            'jenis_izin_id' => '2',
            'status' => 'active',
            'note' => '<li>Semua berkas harus diisi dengan lengkap.</li>
            <li>Surat Keabsahan Keaslian (dengan materai) dapat ditemukan dalam format yang tidak baku di internet.</li>
            <li>Surat Mentaati Peraturan Perundang-undangan (Bermaterai) dapat ditemukan dalam format yang tidak baku, silakan cari di internet.</li>',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Izin Penelitian (Untuk: Lembaga / Instansi / Perusahaan)',
            'sektor_id' => '1',
            'jenis_izin_id' => '2',
            'status' => 'active',
            'note' => '<li>Semua berkas harus diisi dengan lengkap.</li>
            <li>Surat Keabsahan Keaslian (dengan materai) dapat ditemukan dalam format yang tidak baku di internet.</li>
            <li>Surat Mentaati Peraturan Perundang-undangan (Bermaterai) dapat ditemukan dalam format yang tidak baku, silakan cari di internet.</li>',
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Persetujuan Rencana Pengoperasian Kapal',
            'sektor_id' => '2',
            'jenis_izin_id' => '1',
            'status' => 'active',
            'note' => '<li>Jika GT (Gross Tonnage) kapal berada di bawah 10, maka persyaratan poin 4, 5, dan 6 tidak diperlukan.</li>
            <li>Jika mengurus permohonan baru (bukan perpanjangan), maka persyaratan RPK Sebelumnya (Kepri) menjadi tidak diperlukan.</li>'
        ]);
        \App\Models\Perizinan::create([
            'nama_perizinan' => 'Persetujuan Rencana Pengoperasian Kapal Angkutan Penyeberangan (Roro)',
            'sektor_id' => '2',
            'jenis_izin_id' => '1',
            'status' => 'active',
            'note' => '<li>Seluruh berkas wajib diisi.</li>'
        ]);
    }
}
