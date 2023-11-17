<?php

namespace App\Http\Controllers\Pemohon;

use Carbon\Carbon;
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

        return view('pemohon.create', [
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'jenis_identitas' => $jenis_identitas,
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
            $permohonan->peneliti()->createMany($request->peneliti);
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
        //
        $berkas = $pemohon->berkas->first();

        $fields = [
            'field_1' => ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->field_1),
            'field_2' => ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->field_2),
            'field_3' => ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->field_3),
            'field_4' => ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->field_4),
            'field_5' => ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->field_5),
        ];
        $perizinan = Perizinan::find($pemohon->perizinan_id);

        $persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->get();
        $status_berkas = StatusBerkas::where('status_berkasable_id', $pemohon->id)->first();
        $penelitian = $pemohon->penelitian()->first();
        $peneliti = $pemohon->peneliti()->get();
        return view('pemohon.edit', [
            'pemohon' => $pemohon,
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'berkas' => $berkas,
            'status_berkas' => $status_berkas,
            'penelitian' => $penelitian,
            'peneliti' => $peneliti,
            'fields' => $fields,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $pemohon)
    {
        //
        HandleSpladeFileUploads::forRequest($request);

        $fields_existing = [
            'field_1_existing' => $request->fields['field_1_existing'],
            'field_2_existing' => $request->fields['field_2_existing'],
            'field_3_existing' => $request->fields['field_3_existing'],
            'field_4_existing' => $request->fields['field_4_existing'],
            'field_5_existing' => $request->fields['field_5_existing'],
        ];

        $typeId = $pemohon->perizinan_id;

        $rules = [];
        $messages = [];
        for ($i = 1; $i <= 30; $i++) {
            $rules["field_$i"] = 'file|max:2000';
            $messages["field_$i.file"] = "Perhatikan File $i harus format (.pdf) & tidak boleh lebih dari 2 MB!";
        }

        dd($request->hasFile('field_1'));

        $berkasRequest = $request->validate($rules);
        $currentMonthYear = Carbon::now()->format('Y-F');
        for ($i = 1; $i <= 30; $i++) {
            $fieldName = 'field_' . $i;
            dd("TRUE");
                Storage::delete('public/docs/' . $fields_existing[$fieldName . '_existing']);
                $berkasRequest[$fieldName] = $fields_existing[$fieldName . '_existing'];
            
        };

        dd($berkasRequest);

        // Create Permohonan
        $permohonan = Permohonan::find($pemohon->id);
        $permohonan->update([
            'status_permohonan_id' => 3, 
            'user_id' => Auth::user()->id, 
            'perizinan_id' => $typeId,
        ]);
        $permohonan->berkas()->update($berkasRequest);

        //Custom Perizinan        
        if ($typeId == 1) {
            $penelitianRequest = $request->validate([
                'judul_penelitian' => ['required', 'string', 'max:255'],
                'nim' => ['required', 'string', 'max:255'],
                'jenjang' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
                'universitas' => ['required', 'string', 'max:255'],
                'lokasi_penelitian' => ['required', 'string', 'max:255'],
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
            $permohonan->penelitian()->update($penelitianLembagaRequest);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
