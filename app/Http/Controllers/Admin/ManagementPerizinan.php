<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use App\Models\JenisIzin;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tables\Admin\Perizinans;
use ProtoneMedia\Splade\Facades\Toast;

class ManagementPerizinan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_izin_id = JenisIzin::all();
        $sektor_id = Sektor::all();
        return view('admin.management_perizinan.index', [
            'jenis_izin_id' => $jenis_izin_id,
            'sektor_id' => $sektor_id,
            'perizinans' => Perizinans::class
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
        $request->validate([
            'nama_perizinan' => ['required', 'string', 'max:255'],
            'sektor_id' => ['required', 'string', 'max:255'],
            'jenis_izin_id' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Perizinan::create([
            'nama_perizinan' => $request->nama_perizinan,
            'sektor_id' => $request->sektor_id,
            'jenis_izin_id' => $request->jenis_izin_id,
            'status' => $request->status
        ]);
        
        Toast::title('Perizinan berhasil di tambah!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-perizinan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
