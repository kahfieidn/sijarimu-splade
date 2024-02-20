<?php

namespace App\Http\Controllers\Cetak;

use Carbon\Carbon;
use App\Models\Profile;
use App\Models\TypeRpk;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GeneratePerizinan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function generatePerizinan(Request $request, $perizinan_id, $permohonan_id)
    {
        $pemohon = Permohonan::find($permohonan_id);
        $users = $pemohon->user;
        $get_id_users = $pemohon->user->id;
        $nama_user = $pemohon->user->name;
        $get_nama_izin = $pemohon->perizinan->nama_perizinan;
        $profile = Profile::where('user_id', $pemohon->user_id)->first();

        if ($perizinan_id == 4) {
            $penelitians = TypeRpk::where('type_rpkable_id', $pemohon->id)->first();
            $type_rpk = $pemohon->type_rpk->first();
            $date_ttd = Carbon::parse($pemohon->updated_at)->translatedFormat('d F Y');;
            $data = [
                'pemohon' => $pemohon,
                'penelitians' => $penelitians,
                'users' => $users,
                'date_ttd' => $date_ttd,
                'get_id_users' => $get_id_users,
                'profile' => $profile,
                'type_rpk' => $type_rpk
            ];
            $pdf = Pdf::loadView('cetak.request', $data);
            $customPaper = array(0, 0, 609.4488, 935.433);
            $pdf->set_paper($customPaper);
            $pdf->render();
        } 
        if ($get_id_users == Auth::id()) {
            return $pdf->download($get_nama_izin . ' ' . $nama_user . '.pdf');
        } else if ($this->middleware(['role: admin|front_office|back_office|opd|sekretariat'])) {
            return $pdf->stream($get_nama_izin . ' ' . $nama_user . '.pdf');
        }
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
