<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use App\Models\StatusBerkas;
use Illuminate\Http\Request;
use App\Models\StatusPermohonan;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;
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
        $user = $pemohon->user()->first();

        //Custom Perizinan
        if ($pemohon->perizinan_id == 1) {
            $penelitian = $pemohon->penelitian()->first();
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'user' => $user,
            ]);
        } else if ($pemohon->perizinan_id == 2) {
            $penelitian = $pemohon->penelitian()->first();
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'user' => $user,
            ]);
        }else if($pemohon->perizinan_id == 3){
            $penelitian = $pemohon->penelitian()->first();
            $peneliti = $pemohon->peneliti()->get();
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'peneliti' => $peneliti,
                'user' => $user,
            ]);
        }
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
    public function update(Request $request, Permohonan $pemohon)
    {
        $pemohon->update([
            'status_permohonan_id' => $request->status_permohonan_id,
            'catatan' => $request->catatan,
        ]);
        $pemohon->status_berkas()->update($request->status_berkas);
        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('front-office.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
