<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Persyaratan Penelitian Mahasiswa
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Kartu Tanda Penduduk',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Kartu Mahasiswa',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Keabsahan Keaslian (Bermaterai)',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Mentaati Peraturan Perundang-undangan (Bermaterai)',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Proposal Penelitian',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Permohonan Izin dari Universitas di Tujukan Ke Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Kepri',
            'perizinan_id' => '1',
            'status' => 'active',
        ]);

        //Persyaratan Penelitian Perorangan
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Kartu Tanda Penduduk',
            'perizinan_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Keabsahan Keaslian',
            'perizinan_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Mentaati Peraturan Perundang-undangan',
            'perizinan_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Proposal Penelitian',
            'perizinan_id' => '2',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Permohonan Bermatrai di Tujukan Ke Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Kepri',
            'perizinan_id' => '2',
            'status' => 'active',
        ]);

        //Persyaratan Penelitian Lembaga
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Kartu Tanda Penduduk',
            'perizinan_id' => '3',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Keabsahan Keaslian (Bermaterai)',
            'perizinan_id' => '3',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Mentaati Peraturan Perundang-undangan (Bermaterai)',
            'perizinan_id' => '3',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Proposal Penelitian',
            'perizinan_id' => '3',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Permohonan Izin dari Lembaga / Instansi di Tujukan Ke Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Kepri',
            'perizinan_id' => '3',
            'status' => 'active',
        ]);

        //Persyaratan Rencana Pengoperasian Kapal
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Permohonan Perusahaan Bermatrai di Tujukan Ke Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Provinsi Kepri',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Sertifikat Standar/SIUPER/SIUPAL',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Pas Besar/Pas Kecil',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Surat Ukur Dalam Negeri',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Sertifikat Keselamatan Kapal',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Sertifikat Nasional Garis Muat Kapal Sementara',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'KTP/NPWP Pemohon',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'RPK Sebelumnya',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Dokumentasi/Foto Kapal',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Laporan Realisasi Perjalanan Kapal (Voyage Report) Per Triwulan',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Kapal Penumpang (Speed Boat) Trayek Tidak Tetap harus melampirkan surat izin berlayar bulan sebelumnya',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Dokumen Pakta Integritas Pemilik Perusahaan',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
        \App\Models\Persyaratan::create([
            'nama_persyaratan' => 'Dokumen Pakta Integritas Pemilik Kapal',
            'perizinan_id' => '4',
            'status' => 'active',
        ]);
    }
}
