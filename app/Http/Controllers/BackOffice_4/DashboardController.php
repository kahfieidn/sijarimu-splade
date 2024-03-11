<?php

namespace App\Http\Controllers\BackOffice_4;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\BackOffice4\Permohonans;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back-office-4.index', [
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
        $ket_berkas = $pemohon->ket_berkas->first();
        $user = $pemohon->user()->first();
        $review_permohonan = $pemohon->review_permohonan->first();

        //Custom Perizinan
        if ($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            $bulan_type_rpk = Carbon::now()->format('n'); // Mengambil nomor bulan (1-12)
            function intToRoman($number)
            {
                $map = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
                return $map[$number - 1];
            }
            $bulan_type_rpk_romawi = intToRoman($bulan_type_rpk);
            $no_izin = '00' . $type_rpk->id . '/C2.a' . '/DPMPTSP' . '/' . $bulan_type_rpk_romawi . '/2024';
            return view('back-office-4.show', [
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
                'no_izin' => $no_izin,
                'review_permohonan' => $review_permohonan
            ]);
        } else if ($pemohon->perizinan_id == 5) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk_roro = $pemohon->type_rpk_roro()->first();
            $bulan_type_rpk = Carbon::now()->format('n');
            function intToRoman($number)
            {
                $map = array('I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
                return $map[$number - 1];
            }
            $bulan_type_rpk_romawi = intToRoman($bulan_type_rpk);
            $no_izin = '00' . $type_rpk_roro->id . '/1D.b5' . '/DPMPTSP' . '/' . $bulan_type_rpk_romawi . '/2024';
            return view('back-office-4.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'user' => $user,
                'profile' => $profile,
                'type_rpk_roro' => $type_rpk_roro,
                'no_izin' => $no_izin,
                'review_permohonan' => $review_permohonan
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
        //tracking review permohonan subt
        $pemohon->review_permohonan->first()->update(['back_office_4' => Auth::id()]);

        $currentMonthYear = Carbon::now()->format('Y-F');
        if ($pemohon->perizinan->id == 4) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'catatan_back_office' => null,
                'no_izin' => $request->no_izin,
                'tgl_izin_terbit' => $request->tgl_izin_terbit,
                'tgl_izin_terbit_exp' => $request->tgl_izin_terbit_exp
            ]);
            $pemohon->type_rpk->first()->update($request->type_rpk);
        } else if ($pemohon->perizinan->id == 5) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'catatan_back_office' => null,
                'no_izin' => $request->no_izin,
            ]);
        }

        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('back-office-4.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
