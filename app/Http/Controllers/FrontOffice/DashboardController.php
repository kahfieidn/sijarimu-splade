<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\User;
use App\Tables\Users;
use App\Models\Profile;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use App\Tables\Persyaratans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use App\Notifications\PermohonanDone;
use ProtoneMedia\Splade\Facades\Toast;
use App\Tables\FrontOffice\Permohonans;
use App\Notifications\PermohonanRejected;

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
        $ket_berkas = $pemohon->ket_berkas->first();
        $user = $pemohon->user()->first();

        //Custom Perizinan
        if ($pemohon->perizinan_id == 1) {
            $penelitian = $pemohon->penelitian()->first();
            return view('front-office.show', [
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
            $users = User::all();
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'penelitian' => $penelitian,
                'user' => $user,
                'users' => SpladeTable::for(Persyaratan::query()->where('perizinan_id', $pemohon->perizinan_id))
                    ->column('nama_persyaratan', searchable: true)
                    ->column('id')
                    ->column('perizinan_id')
                    ->column('status')
                    ->column('created_at')
                    ->column('updated_at'),
                'persyaratans' => Persyaratans::class

            ]);
        } else if ($pemohon->perizinan_id == 3) {
            $penelitian = $pemohon->penelitian()->first();
            $peneliti = $pemohon->peneliti()->get();
            return view('front-office.show', [
                'pemohon' => $pemohon,
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
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'user' => $user,
                'type_rpk' => $type_rpk,
                'profile' => $profile,
            ]);
        }else if ($pemohon->perizinan_id == 5) {
            $profile = Profile::where('user_id', $pemohon->user_id)->first();
            $type_rpk_roro = $pemohon->type_rpk_roro()->first();
            return view('front-office.show', [
                'pemohon' => $pemohon,
                'berkas' => $berkas,
                'persyaratan' => $persyaratan,
                'status_berkas' => $status_berkas,
                'ket_berkas' => $ket_berkas,
                'perizinan' => $perizinan,
                'berkas' => $berkas,
                'user' => $user,
                'type_rpk_roro' => $type_rpk_roro,
                'profile' => $profile,
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
        $ket_berkas_request = array_slice($request->ket_berkas, 0, 30);
        $pemohon->ket_berkas()->update($ket_berkas_request);
        $status_berkas_request = array_slice($request->status_berkas, 0, 30);
        $pemohon->status_berkas()->update($status_berkas_request);

        //Notify
        if ($request->status_permohonan_id == 1 || $request->status_permohonan_id == 2) {
            $pemohon->user->notify(new PermohonanRejected($pemohon));
        }else if ($request->status_permohonan_id == 10) {
            $pemohon->user->notify(new PermohonanDone($pemohon));
        }
        
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
