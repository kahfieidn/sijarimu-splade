<?php

namespace App\Http\Controllers\BackOffice;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tables\BackOffice\Permohonans;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back-office.index', [
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
        if ($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            return view('back-office.show', [
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
        $currentMonthYear = Carbon::now()->format('Y-F');
        $berkas = $request->file('surat_rekomendasi');
        $storageDirectory = 'public/docs/' . $currentMonthYear;
        $fileName = $berkas->hashName();
        $berkas->storeAs($storageDirectory, $fileName);
        $berkasRequest['surat_rekomendasi'] = $currentMonthYear . '/' . $fileName;

        // Custom Perizinan
        if ($pemohon->perizinan->id == 4) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        }

        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('back-office.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
