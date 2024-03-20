<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Perizinan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;

class ManagementPersyaratan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $perizinan_id = Perizinan::all();
        return view('admin.management_persyaratan.create', [
            'perizinan_id' => $perizinan_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_persyaratan' => ['required', 'string', 'max:255'],
            'perizinan_id' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Persyaratan::create([
            'nama_persyaratan' => $request->nama_persyaratan,
            'deskripsi' => $request->deskripsi,
            'perizinan_id' => $request->perizinan_id,
            'status' => $request->status
        ]);

        Toast::title('Persyaratan berhasil di tambah!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-perizinan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persyaratan $persyaratan_id)
    {
        //
        dd("here");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persyaratan $persyaratan_id)
    {
        //
        return view('admin.management_persyaratan.edit', $persyaratan_id, [
            'persyaratan' => $persyaratan_id,
            'perizinan' => Perizinan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persyaratan $persyaratan_id)
    {
        //
        $persyaratan_id->update([
            'nama_persyaratan' => $request->persyaratan['nama_persyaratan'],
            'deskripsi' => $request->persyaratan['deskripsi'],
            'perizinan_id' => $request->persyaratan['perizinan_id'],
            'status' => $request->persyaratan['status']
        ]);

        Toast::title('Persyaratan berhasil di edit!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-perizinan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persyaratan $persyaratan_id)
    {
        //
        $persyaratan_id->delete();

        Toast::title('Syarat berhasil di hapus!')
            ->rightBottom()
            ->autoDismiss(10);
        return back();
    }
}
