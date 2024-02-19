<?php

namespace App\Http\Controllers\Opd;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Tables\Opd\Permohonans;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('opd.index', [
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
        //
        $berkas = $pemohon->berkas->first();
        $perizinan = Perizinan::find($pemohon->perizinan_id);
        $persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan->id)->get();
        $status_berkas = $pemohon->status_berkas->first();
        $user = $pemohon->user()->first();

        //Custom Perizinan
        if ($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            return view('opd.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'user' => $user,
                'profile' => $profile,
                'type_rpk' => $type_rpk,
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
        HandleSpladeFileUploads::forRequest($request);
        $fieldName = 'surat_rekomendasi';
        $currentMonthYear = Carbon::now()->format('Y-F');
        if (!isset($request->fields[$fieldName . '_existing']) && $request->status_permohonan_id == 5) {
            Storage::delete('/public/docs' . '/' . $pemohon->surat_rekomendasi);

            $berkas = $request->file($fieldName);
            $storageDirectory = 'public/docs/' . $currentMonthYear;
            $fileName = $berkas->hashName();
            $berkas->storeAs($storageDirectory, $fileName);
            $surat_rekomendasiRequest[$fieldName] = $currentMonthYear . '/' . $fileName;
        } else {
            $surat_rekomendasiRequest[$fieldName] = $pemohon->surat_rekomendasi;
        }

        // Custom Perizinan
        if ($pemohon->perizinan->id == 4) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'no_surat_rekomendasi' => $request->no_surat_rekomendasi,
                'surat_rekomendasi' => $surat_rekomendasiRequest[$fieldName],
            ]);
        }

        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('opd.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
