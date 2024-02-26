<?php

namespace App\Http\Controllers\BackOffice_3;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PermohonanDone;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\BackOffice3\Permohonans;
use App\Notifications\PermohonanRejected;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back-office-3.index', [
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
        $ket_berkas = $pemohon->ket_berkas->first();
        $user = $pemohon->user()->first();

        //Custom Perizinan
        if ($pemohon->perizinan_id == 1) {
            $penelitian = $pemohon->penelitian()->first();
            return view('back-office-3.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'user' => $user,
            ]);
        } else if ($pemohon->perizinan_id == 2) {
            $penelitian = $pemohon->penelitian()->first();
            return view('back-office-3.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'user' => $user,
            ]);
        }else if ($pemohon->perizinan_id == 3) {
            $penelitian = $pemohon->penelitian()->first();
            $nomor_izin = '00' . $penelitian->id . '/2n.1' . '/DPMPTSP' . '/2024';
            $peneliti = $pemohon->peneliti()->get();
            return view('back-office-3.show', [
                'pemohon' => $pemohon,
                'nomor_izin' => $nomor_izin,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'peneliti' => $peneliti,
                'user' => $user,
            ]);
        }else if($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            $bulan_type_rpk = Carbon::now()->format('n'); // Mengambil nomor bulan (1-12)
            function intToRoman($number)
            {
                $map = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
                return $map[$number - 1];
            }
            $bulan_type_rpk_romawi = intToRoman($bulan_type_rpk);
            $no_izin = '00' . $type_rpk->id . '/C2.a' . '/DPMPTSP' . '/' .$bulan_type_rpk_romawi . '/2024';
            return view('back-office-3.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'user' => $user,
                'profile' => $profile,
                'type_rpk' => $type_rpk,
                'no_izin' => $no_izin
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
        // Custom Perizinan
        if ($pemohon->perizinan->id == 1) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        }else if($pemohon->perizinan->id == 2){
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        }else if($pemohon->perizinan->id == 3){
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        }else if($pemohon->perizinan->id == 4){
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'no_izin' => $request->no_izin
            ]);
        }


        //Notify
        if ($request->status_permohonan_id == 1 || $request->status_permohonan_id == 2) {
            $pemohon->user->notify(new PermohonanRejected($pemohon));
        } else if ($request->status_permohonan_id == 10) {
            $pemohon->user->notify(new PermohonanDone($pemohon));
        }

        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('back-office-3.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}