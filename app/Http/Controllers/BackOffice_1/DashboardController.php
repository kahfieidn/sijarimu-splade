<?php

namespace App\Http\Controllers\BackOffice_1;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PermohonanDone;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\BackOffice1\Permohonans;
use App\Notifications\PermohonanRejected;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back-office-1.index', [
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

        //Custom Perizinan
        if ($pemohon->perizinan_id == 1) {
            $penelitian = $pemohon->penelitian()->first();
            $no_izin = '00' . $penelitian->id . '/2n.1' . '/DPMPTSP' . '/2024';
            return view('back-office-1.show', [
                'no_izin' => $no_izin,
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
            $no_izin = '00' . $penelitian->id . '/2n.1' . '/DPMPTSP' . '/2024';
            return view('back-office-1.show', [
                'no_izin' => $no_izin,
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
        } else if ($pemohon->perizinan_id == 3) {
            $penelitian = $pemohon->penelitian()->first();
            $no_izin = '00' . $penelitian->id . '/2n.1' . '/DPMPTSP' . '/2024';
            $peneliti = $pemohon->peneliti()->get();
            return view('back-office-1.show', [
                'pemohon' => $pemohon,
                'no_izin' => $no_izin,
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
        } else if ($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            return view('back-office-1.show', [
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
            ]);
        } else if ($pemohon->perizinan_id == 5) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk_roro = $pemohon->type_rpk_roro()->first();
            return view('back-office-1.show', [
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
        $pemohon->review_permohonan->first()->update(['back_office_1' => Auth::id()]);

        // Custom Perizinan
        if ($pemohon->perizinan->id == 1) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'no_izin' => $request->no_izin
            ]);
            $pemohon->penelitian()->update([
                'menimbang' => $request->penelitian['menimbang'],
            ]);
        } else if ($pemohon->perizinan->id == 2) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'no_izin' => $request->no_izin
            ]);
            $pemohon->penelitian()->update([
                'menimbang' => $request->penelitian['menimbang'],
            ]);
        } else if ($pemohon->perizinan->id == 3) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'no_izin' => $request->no_izin
            ]);
            $pemohon->penelitian()->update([
                'menimbang' => $request->penelitian['menimbang'],
            ]);
        }

        if ($request->status_permohonan_id == 1 || $request->status_permohonan_id == 2) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        } else if(!in_array($pemohon->perizinan_id, [1,2,3])){
            $request->validate([
                'status_permohonan_id' => ['required', 'string', 'max:255'],
                'catatan' => ['nullable'],
                'no_permintaan_rekomendasi' => ['required', 'string', 'max:255'],
                'no_surat_permohonan' => ['required'],
                'tgl_surat_permohonan' => ['date', 'required'],
            ]);
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
                'catatan_back_office' => null,
                'no_permintaan_rekomendasi' => $request->no_permintaan_rekomendasi,
                'tgl_permintaan_rekomendasi' => Carbon::now(),
                'no_surat_permohonan' => $request->no_surat_permohonan,
                'tgl_surat_permohonan' => $request->tgl_surat_permohonan,
                'back_office' => Auth::id()
            ]);
            if ($pemohon->perizinan->id == 4) {
                $pemohon->type_rpk->first()->update($request->type_rpk);
            } else if ($pemohon->perizinan->id == 5) {
                $pemohon->type_rpk_roro->first()->update($request->type_rpk_roro);
            }
        }

        $ket_berkas_request = array_slice($request->ket_berkas, 0, 30);
        $pemohon->ket_berkas()->update($ket_berkas_request);
        $status_berkas_request = array_slice($request->status_berkas, 0, 30);
        $pemohon->status_berkas()->update($status_berkas_request);

        //Notify
        if ($request->status_permohonan_id == 1 || $request->status_permohonan_id == 2) {
            $pemohon->user->notify(new PermohonanRejected($pemohon));
        } else if ($request->status_permohonan_id == 12) {
            $pemohon->user->notify(new PermohonanDone($pemohon));
        }

        Toast::title('Permohonan berhasil di review!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('back-office-1.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
