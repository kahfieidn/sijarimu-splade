<?php

namespace App\Http\Controllers\BackOffice_2;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\TypeRpk;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Notifications\PermohonanDone;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\BackOffice2\Permohonans;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PermohonanRejected;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back-office-2.index', [
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
        if ($pemohon->perizinan_id == 4) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk = $pemohon->type_rpk()->first();
            return view('back-office-2.show', [
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
            return view('back-office-2.show', [
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
        // Custom Perizinan
        if ($pemohon->perizinan->id == 4) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        } else if ($pemohon->perizinan->id == 5) {
            $pemohon->update([
                'status_permohonan_id' => $request->status_permohonan_id,
                'catatan' => $request->catatan,
            ]);
        }

        $currentMonthYear = Carbon::now()->format('Y-F');
        $users = $pemohon->user;
        $profile = Profile::where('user_id', $pemohon->user_id)->first();

        // save file rekomendasi
        if (in_array($pemohon->status_permohonan_id, [6, 7, 8, 9, 10])) {
            if($pemohon->perizinan_id == 4){
                $type_rpk = TypeRpk::where('type_rpkable_id', $pemohon->id)->first();
                $data = [
                    'pemohon' => $pemohon,
                    'type_rpk' => $type_rpk,
                    'users' => $users,
                    'profile' => $profile
                ];
            }else if($pemohon->perizinan_id == 5){
                $type_rpk_roro = $pemohon->type_rpk_roro->first();
                $data = [
                    'pemohon' => $pemohon,
                    'type_rpk_roro' => $type_rpk_roro,
                    'users' => $users,
                    'profile' => $profile
                ];
            }
            $storageDirectory = 'permintaan_rekomendasi/' . $currentMonthYear . '/' . $pemohon->id . '.pdf';
            $pdf = PDF::loadView('cetak.permintaan-rekomendasi-request', $data);
            $customPaper = array(0, 0, 609.4488, 935.433);
            $pdf->set_paper($customPaper);
            $fileContent = $pdf->output();
            $hashedFileName = hash('sha256', $storageDirectory) . '.' . pathinfo($storageDirectory, PATHINFO_EXTENSION);
            Storage::put('public/permintaan_rekomendasi/' . $currentMonthYear . '/' . $hashedFileName, $fileContent);
            $pemohon->update([
                'file_permintaan_rekomendasi' => $currentMonthYear . '/' . $hashedFileName,
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
        return to_route('back-office-2.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
