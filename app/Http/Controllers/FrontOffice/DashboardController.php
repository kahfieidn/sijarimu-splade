<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use App\Models\StatusBerkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusPermohonan;
use App\Tables\FrontOffice\Permohonans;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('front-office.index', [
            'permohonans' => Permohonans::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $pemohon)
    {
        $berkas = $pemohon->berkas->first();
        $perizinan = Perizinan::find($pemohon->perizinan_id);
        $persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan->id)->get();
        $status_berkas = $pemohon->status_berkas->first();
        $status_permohonan = $pemohon->status_permohonan->first();
        $status_permohonan_front_office = [
            '1' => 'Ditolak',
            '2' => 'Revisi',
            '5' => 'Sudah Lengkap (Teruskan Ke Back Office (2))',
        ];
        $penelitian = $pemohon->penelitian()->first();
        $peneliti = $pemohon->peneliti()->get();
        $typeRpk = $pemohon->type_rpk()->first();
        return view('front-office.show', [
            'pemohon' => $pemohon,
            'berkas' => $berkas,
            'persyaratan' => $persyaratan,
            'status_berkas' => $status_berkas,
            'perizinan' => $perizinan,
            'berkas' => $berkas,
            'penelitian' => $penelitian,
            'peneliti' => $peneliti,
            'typeRpk' => $typeRpk,
            'status_permohonan' => $status_permohonan,
            'status_permohonan_front_office' => $status_permohonan_front_office,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
