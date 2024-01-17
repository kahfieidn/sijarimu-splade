<?php

namespace App\Http\Controllers\Pemohon;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Perizinan;
use App\Models\Permohonan;
use App\Models\Persyaratan;
use App\Models\StatusBerkas;
use Illuminate\Http\Request;
use App\Models\StatusPermohonan;
use App\Tables\Pemohon\Permohonans;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\Splade\FileUploads\ExistingFile;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

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

        $jenis_identitas = [
            'nik' => 'NIK',
            'nim' => 'NIM',
        ];

        $user = User::find(Auth::id());
        return view('pemohon.create', [
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'jenis_identitas' => $jenis_identitas,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $typeId = $request->perizinan['id'];
        $rules = [];
        $messages = [];
        for ($i = 1; $i <= 30; $i++) {
            $rules["field_$i"] = 'file|max:2000';
            $messages["field_$i.file"] = "Perhatikan File $i harus format (.pdf) & tidak boleh lebih dari 2 MB!";
        }
        $berkasRequest = $request->validate($rules, $messages);
        $currentMonthYear = Carbon::now()->format('Y-F');
        for ($i = 1; $i <= 30; $i++) {
            $fieldName = 'field_' . $i;
            if ($request->file($fieldName)) {
                $berkas = $request->file($fieldName);
                $storageDirectory = 'public/docs/' . $currentMonthYear;
                $fileName = $berkas->hashName();
                $berkas->storeAs($storageDirectory, $fileName);
                $berkasRequest[$fieldName] = $currentMonthYear . '/' . $fileName;
            }
        };

        // Create Permohonan
        $permohonan = Permohonan::create(['status_permohonan_id' => 3, 'user_id' => Auth::user()->id, 'perizinan_id' => $typeId]);
        $permohonan->berkas()->create($berkasRequest);
        $permohonan->status_berkas()->create([null]);

        //Custom Perizinan        
        if ($typeId == 1) {
            $penelitianRequest = $request->validate([
                'judul_penelitian' => ['required', 'string', 'max:255'],
                'nim' => ['required', 'string', 'max:255'],
                'jenjang' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
                'universitas' => ['required', 'string', 'max:255'],
                'lokasi_penelitian' => ['required', 'string', 'max:255'],
                'waktu_awal_penelitian' => 'date',
                'waktu_akhir_penelitian' => 'date',
            ]);
            $permohonan->penelitian()->create($penelitianRequest);
        } else if ($typeId == 2) {
            $penelitianRequest = $request->validate([
                'lembaga' => ['required', 'string', 'max:255'],
                'judul_penelitian' => ['required', 'string', 'max:255'],
                'waktu_awal_penelitian' => 'date',
                'waktu_akhir_penelitian' => 'date',
                'lokasi_penelitian' => ['required', 'string', 'max:255'],
            ]);
            $permohonan->penelitian()->create($penelitianRequest);
        } else if ($typeId == 3) {
            $penelitianLembagaRequest = $request->validate([
                'lembaga' => ['required', 'string', 'max:255'],
                'judul_penelitian' => ['required', 'string', 'max:255'],
                'waktu_awal_penelitian' => 'date',
                'waktu_akhir_penelitian' => 'date',
                'lokasi_penelitian' => ['required', 'string', 'max:255'],
            ]);
            $permohonan->penelitian()->create($penelitianLembagaRequest);
            if($request->peneliti != null){
                $permohonan->peneliti()->createMany($request->peneliti);
            }
        } else if ($typeId == 4) {
            $typeRpk = $request->validate([
                'nama_kapal' => ['required', 'string', 'max:255'],
                'jenis_kapal' => ['required', 'string', 'max:255'],
                'bendera' => ['required', 'string', 'max:255'],
                'isi_kotor' => ['required', 'string', 'max:255'],
                'tenaga_penggerak' => ['required', 'string', 'max:255'],
                'status_kepemilikan_kapal' => ['required', 'string', 'max:255'],
                'kapasitas_angkut' => ['required', 'string', 'max:255'],
                'pelabuhan_pangkal' => ['required', 'string', 'max:255'],
                'trayek' => ['required', 'string', 'max:255'],
                'urgensi' => ['required', 'string', 'max:255'],
            ]);
            $permohonan->type_rpk()->create($typeRpk);
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
        if ($pemohon->user_id != Auth::user()->id) {
            abort(403);
        }
        return view('pemohon.show', [
            'status_permohonan' => StatusPermohonan::all(),
            'permohonan' => $pemohon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Permohonan $pemohon)
    {
        if ($pemohon->user_id != Auth::user()->id or $pemohon->status_permohonan_id != 2) {
            abort(403);
        }

        $berkas = $pemohon->berkas->first();
        $jumlah_persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->count();
        $fields = [];
        for ($i = 1; $i <= $jumlah_persyaratan; $i++) {
            $fields['field_' . $i] = ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->{'field_' . $i});
        }

        $perizinan = Perizinan::find($pemohon->perizinan_id);
        $persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->get();
        $status_berkas = StatusBerkas::where('status_berkasable_id', $pemohon->id)->first();
        $penelitian = $pemohon->penelitian()->first();
        $peneliti = $pemohon->peneliti()->get();
        $typeRpk = $pemohon->type_rpk()->first();
        return view('pemohon.edit', [
            'pemohon' => $pemohon,
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'berkas' => $berkas,
            'status_berkas' => $status_berkas,
            'penelitian' => $penelitian,
            'peneliti' => $peneliti,
            'fields' => $fields,
            'typeRpk' => $typeRpk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $pemohon)
    {
        if ($pemohon->user_id != Auth::user()->id or $pemohon->status_permohonan_id != 2) {
            abort(403);
        }

        HandleSpladeFileUploads::forRequest($request);

        $typeId = $pemohon->perizinan_id;

        $rules = [];
        $messages = [];
        for ($i = 1; $i <= 30; $i++) {
            $rules["field_$i"] = 'file|max:2000';
            $messages["field_$i.file"] = "Perhatikan File $i harus format (.pdf) & tidak boleh lebih dari 2 MB!";
        }

        $berkasRequest = $request->validate($rules);
        $currentMonthYear = Carbon::now()->format('Y-F');
        $jumlah_persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->count();
        for ($i = 1; $i <= $jumlah_persyaratan; $i++) {
            $fieldName = 'field_' . $i;
            if (!isset($request->fields[$fieldName . '_existing'])) {
                Storage::delete('/public/docs' . '/' . $pemohon->berkas->first()->$fieldName);

                $berkas = $request->file('fields' . '.' . $fieldName);
                $storageDirectory = 'public/docs/' . $currentMonthYear;
                $fileName = $berkas->hashName();
                $berkas->storeAs($storageDirectory, $fileName);
                $berkasRequest[$fieldName] = $currentMonthYear . '/' . $fileName;
            }
        };

        // Create Permohonan
        $permohonan = Permohonan::find($pemohon->id);
        $permohonan->update([
            'status_permohonan_id' => 3,
            'user_id' => Auth::user()->id,
            'perizinan_id' => $typeId,
            'catatan' => null,
            'catatan_back_office' => null,
        ]);
        $permohonan->berkas()->update($berkasRequest);

        //Custom Perizinan        
        if ($typeId == 1) {
            $pemohon->penelitian()->first()->update($request->penelitian);
        } else if ($typeId == 2) {
            $pemohon->penelitian()->first()->update($request->penelitian);
        } else if ($typeId == 3) {
            $pemohon->penelitian()->first()->update($request->penelitian);
            foreach ($request->peneliti as $penelitiData) {
                $penelitiId = $penelitiData['id'];
                $pemohon->peneliti()->where('id', $penelitiId)->first()->update($penelitiData);
            }
        } else if ($typeId == 4){
            $pemohon->type_rpk()->first()->update($request->typeRpk);
        }
        Toast::title('Permohonan anda berhasil di ajukan kembali!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('pemohon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
