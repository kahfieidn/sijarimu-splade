<?php

namespace App\Http\Controllers\Pemohon;

use App\Models\User;
use App\Models\Berkas;
use App\Models\JenisIzin;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Tables\Pemohon\Permohonans;
use App\Http\Controllers\Controller;
use App\Http\Requests\BerkasRequest;
use App\Models\StatusBerkas;
use App\Models\StatusPermohonan;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\Facades\Splade;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pemohon.index', [
            'perizinans' => Perizinan::all(),
            'permohonans' => Permohonans::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $perizinan = Perizinan::find($request->query('perizinans'));
        $persyaratan = Persyaratan::where('perizinan_id', $request->query('perizinans'))->get();
        
        $request->validate([
            'perizinans' => ['required'],
        ], [
            'perizinans.required' => 'Pilih jenis izin yang ingin anda ajukan!'
        ]);

        return view('pemohon.create', [
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $typeId = $request->id;
        
        $rules = [];
        $messages = [];
        
        for ($i = 1; $i <= 30; $i++) {
            $rules["field_$i"] = 'file|max:2000';
            $messages["field_$i.file"] = "Perhatikan File $i harus format (.pdf) & tidak boleh lebih dari 2 MB!";
        }        
        
        $berkasRequest = $request->validate($rules, $messages);

        for ($i = 1; $i <= 30; $i++) {
            $fieldName = 'field_' . $i;
            if ($request->file($fieldName)) {
                $file = $request->file($fieldName);

                $fileExtension = $file->getClientOriginalExtension();
                $monthDirectory = date('Y-m');
                $file_name = uniqid() . '.' . $fileExtension;
                $file->move(public_path('dokumen/user/' . $monthDirectory), $file_name);
                $validatedData[$fieldName] = 'dokumen/user/' . $monthDirectory . '/' . $file_name;
            }
        };
        
        if ($typeId == 1) {
            $request->validate([
                'judul_penelitian' => ['required', 'string', 'max:255'],
                'nim' => ['required', 'string', 'max:255'],
                'jenjang' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
                'universitas' => ['required', 'string', 'max:255'],
                'lokasi_penelitian' => ['required', 'string', 'max:255'],
            ]);
            $permohonan = Permohonan::create([
                'status_permohonan_id' => 3,
                'user_id' => Auth::user()->id,
                'perizinan_id' => $typeId,
            ]);
            $permohonan->berkas()->create($berkasRequest);
            $permohonan->status_berkas()->create([null,]);
            $permohonan->penelitian()->create([
                'nim' => $request['nim'],
                'judul_penelitian' => $request['judul_penelitian'],
                'universitas' => $request['universitas'],
                'jurusan' => $request['jurusan'],
                'jenjang' => $request['jenjang'],
                'lokasi_penelitian' => $request['lokasi_penelitian'],
            ]);
        }

        Toast::title('Permohonan anda berhasil di ajukan!')
        ->rightBottom()
        ->autoDismiss(10);
        return to_route('pemohon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Permohonan $pemohon)
    {
        //
        return view('pemohon.show', [
            'status_permohonan' => StatusPermohonan::whereBetween('id', [3, 10])->get(),
            'permohonan' => $pemohon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
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
