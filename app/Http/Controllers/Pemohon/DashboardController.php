<?php

namespace App\Http\Controllers\Pemohon;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Profile;
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
use App\Notifications\PermohonanCreated;
use Illuminate\Support\Facades\Notification;
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
            'perizinans' => Perizinan::where('status', 'active')->get(),
            'permohonans' => Permohonans::class
        ]);
    }

    public function profile(Request $request)
    {

        $currentMonthYear = Carbon::now()->format('Y-F');
        $npwp_file = $request->file('profile.npwp_file');
        $nib_file = $request->file('profile.nib_file');
        $storageDirectory = 'public/profile_usaha/' . $currentMonthYear;
        $hash_nib_file = $nib_file->hashName();
        $hash_npwp_file = $npwp_file->hashName();
        $nib_file->storeAs($storageDirectory, $hash_nib_file);
        $npwp_file->storeAs($storageDirectory, $hash_npwp_file);
        $set_db_hash_nib_file = $currentMonthYear . '/' . $hash_nib_file;
        $set_db_hash_npwp_file = $currentMonthYear . '/' . $hash_npwp_file;

        Profile::create([
            'user_id' => Auth::id(),
            'npwp' => $request->profile['npwp'],
            'npwp_file' => $set_db_hash_npwp_file,
            'perusahaan' => $request->profile['perusahaan'],
            'alamat' => $request->profile['alamat'],
            'nib' => $request->profile['nib'],
            'nib_file' => $set_db_hash_nib_file,
            'domisili' => $request->profile['domisili'],
            'provinsi_domisili' => $request->profile['provinsi_domisili'],
        ]);


        return redirect()->back();
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
        $profile = Profile::where('user_id', Auth::id())->first();
        if ($profile != null) {
            $profile['npwp_file'] = ExistingFile::fromDisk('public')->get('/profile_usaha' . '/' . $profile->{'npwp_file'});
            $profile['nib_file'] = ExistingFile::fromDisk('public')->get('/profile_usaha' . '/' . $profile->{'nib_file'});
        }


        return view('pemohon.create', [
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'jenis_identitas' => $jenis_identitas,
            'user' => $user,
            'profile' => $profile,
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
        if (in_array($typeId, [1, 2, 3])) {
            $permohonan = Permohonan::create(['status_permohonan_id' => 3, 'user_id' => Auth::user()->id, 'perizinan_id' => $typeId]);
        } else {
            $permohonan = Permohonan::create(['status_permohonan_id' => 4, 'user_id' => Auth::user()->id, 'perizinan_id' => $typeId]);
        }
        $permohonan->berkas()->create($berkasRequest);
        $permohonan->status_berkas()->create([null]);
        $permohonan->ket_berkas()->create([null]);
        $permohonan->review_permohonan()->create([null]);

        //update profile pemohon ngubah
        HandleSpladeFileUploads::forRequest($request);
        if (!in_array($typeId, [1, 2, 3])) {
            $profiles = Profile::where('user_id', Auth::id())->first();
            if (!isset($request->profile['nib_file_existing'])) {
                Storage::delete('/public/profile_usaha' . '/' . $profiles->nib_file);
                $nib_file = $request->file('profile.nib_file');
                $hash_nib_file = $nib_file->hashName();
                $storageDirectory = 'public/profile_usaha/' . $currentMonthYear;
                $nib_file->storeAs($storageDirectory, $hash_nib_file);
                $profiles->update([
                    'nib_file' => $currentMonthYear . '/' . $hash_nib_file,
                ]);
            }
            if (!isset($request->profile['npwp_file_existing'])) {
                Storage::delete('/public/profile_usaha' . '/' . $profiles->npwp_file);
                $npwp_file = $request->file('profile.npwp_file');
                $hash_npwp_file = $npwp_file->hashName();
                $storageDirectory = 'public/profile_usaha/' . $currentMonthYear;
                $npwp_file->storeAs($storageDirectory, $hash_npwp_file);
                $profiles->update([
                    'npwp_file' => $currentMonthYear . '/' . $hash_npwp_file,
                ]);
            }
            $profiles->update([
                'npwp' => $request->profile['npwp'],
                'perusahaan' => $request->profile['perusahaan'],
                'alamat' => $request->profile['alamat'],
                'domisili' => $request->profile['domisili'],
                'nib' => $request->profile['nib'],
            ]);
        }

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
            if ($request->peneliti != null) {
                $permohonan->peneliti()->createMany($request->peneliti);
            }
        } else if ($typeId == 4) {
            $typeRpk = $request->validate([
                'type_trayek' => ['required', 'string', 'max:255'],
                'type_rpk' => ['required', 'string', 'max:255'],
                'type_gt' => ['required', 'string', 'max:255'],
                'nama_kapal' => ['required', 'string', 'max:255'],
                'jenis_kapal' => ['required', 'string', 'max:255'],
                'isi_kotor' => ['required', 'string', 'max:255'],
                'tenaga_penggerak' => ['required', 'string', 'max:255'],
                'status_kepemilikan_kapal' => ['required', 'string', 'max:255'],
                'kapasitas_angkut' => ['required', 'string', 'max:255'],
                'pelabuhan_pangkal' => ['required', 'string', 'max:255'],
                'trayek' => ['required', 'string', 'max:255'],
                'urgensi' => ['required', 'string', 'max:255'],
                'nomor_siupper' => ['required', 'string', 'max:255'],
                'tgl_siupper' => ['required', 'date'],
                'nomor_rpk_sebelumnya' => 'nullable',
                'tgl_rpk_sebelumnya' => 'nullable|date',
            ]);
            $permohonan->type_rpk()->create($typeRpk);
        } else if ($typeId == 5) {
            $typeRpkRoro = $request->validate([
                'type_rpk_roro' => ['required', 'string', 'max:255'],
                'nama_kapal' => ['required', 'string', 'max:255'],
                'lintas' => ['required', 'string', 'max:255'],
                'pemilik_kapal' => ['required', 'string', 'max:255'],
                'nomor_siuap' => ['required', 'string', 'max:255'],
            ]);
            $permohonan->type_rpk_roro()->create($typeRpkRoro);
        }

        $permohonan->user->notify(new PermohonanCreated($permohonan));

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
            if ($berkas->{'field_' . $i} == null) {
                $berkas->{'field_' . $i} == null;
            } else {
                $fields['field_' . $i] = ExistingFile::fromDisk('public')->get('/docs' . '/' . $berkas->{'field_' . $i});
            }
        }

        $perizinan = Perizinan::find($pemohon->perizinan_id);
        $persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->get();
        $status_berkas = StatusBerkas::where('status_berkasable_id', $pemohon->id)->first();
        $ket_berkas = $pemohon->ket_berkas->first();
        $penelitian = $pemohon->penelitian()->first();
        $peneliti = $pemohon->peneliti()->get();

        $profile = Profile::where('user_id', Auth::id())->first();
        if ($profile != null) {
            $profile['npwp_file'] = ExistingFile::fromDisk('public')->get('/profile_usaha' . '/' . $profile->{'npwp_file'});
            $profile['nib_file'] = ExistingFile::fromDisk('public')->get('/profile_usaha' . '/' . $profile->{'nib_file'});
        }

        return view('pemohon.edit', [
            'pemohon' => $pemohon,
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'berkas' => $berkas,
            'status_berkas' => $status_berkas,
            'ket_berkas' => $ket_berkas,
            'penelitian' => $penelitian,
            'peneliti' => $peneliti,
            'type_rpk' => $pemohon->type_rpk->first(),
            'type_rpk_roro' => $pemohon->type_rpk_roro->first(),
            'fields' => $fields,
            'profile' => $profile,
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

        //berkas store
        $berkasRequest = $request->validate($rules);
        $currentMonthYear = Carbon::now()->format('Y-F');
        $jumlah_persyaratan = Persyaratan::where('perizinan_id', $pemohon->perizinan_id)->count();
        for ($i = 1; $i <= $jumlah_persyaratan; $i++) {
            $fieldName = 'field_' . $i;
            $berkas = $request->file('fields' . '.' . $fieldName);

            if ($berkas == null) {
                $berkas = $pemohon->berkas->first()->$fieldName;
            } else if (!isset($request->fields[$fieldName . '_existing'])) {
                Storage::delete('/public/docs' . '/' . $pemohon->berkas->first()->$fieldName);

                $storageDirectory = 'public/docs/' . $currentMonthYear;
                $fileName = $berkas->hashName();
                $berkas->storeAs($storageDirectory, $fileName);
                $berkasRequest[$fieldName] = $currentMonthYear . '/' . $fileName;
            }
        };

        $permohonan = Permohonan::find($pemohon->id);

        $permohonan->berkas()->update($berkasRequest);
        for ($i = 1; $i <= 30; $i++) {
            if (!isset($ket_berkas_request[$i])) {
                $ket_berkas_request['field_' . $i] = null;
            }

            if (!isset($status_berkas_request[$i])) {
                $status_berkas_request['field_' . $i] = null;
            }
        }

        $pemohon->ket_berkas()->update($ket_berkas_request);
        $pemohon->status_berkas()->update($status_berkas_request);

        if (in_array($typeId, [1, 2, 3])) {
            $permohonan = $permohonan->update([
                'status_permohonan_id' => 3,
                'user_id' => Auth::user()->id,
                'perizinan_id' => $typeId,
                'catatan' => null,
                'catatan_back_office' => null,
            ]);
        } else {
            $permohonan = $permohonan->update([
                'status_permohonan_id' => 4,
                'user_id' => Auth::user()->id,
                'perizinan_id' => $typeId,
                'catatan' => null,
                'catatan_back_office' => null,
            ]);
            $profiles = Profile::where('user_id', Auth::id())->first();
            //handle perubahan file nib dan npwp
            if (!isset($request->profile['nib_file_existing'])) {
                Storage::delete('/public/profile_usaha' . '/' . $profiles->nib_file);
                $nib_file = $request->file('profile.nib_file');
                $hash_nib_file = $nib_file->hashName();
                $storageDirectory = 'public/profile_usaha/' . $currentMonthYear;
                
                $nib_file->storeAs($storageDirectory, $hash_nib_file);
                $profiles->update([
                    'nib_file' => $currentMonthYear . '/' . $hash_nib_file,
                ]);
            }
            if (!isset($request->profile['npwp_file_existing'])) {
                Storage::delete('/public/profile_usaha' . '/' . $profiles->npwp_file);
                $npwp_file = $request->file('profile.npwp_file');
                $hash_npwp_file = $npwp_file->hashName();
                $storageDirectory = 'public/profile_usaha/' . $currentMonthYear;
                $npwp_file->storeAs($storageDirectory, $hash_npwp_file);
                $profiles->update([
                    'npwp_file' => $currentMonthYear . '/' . $hash_npwp_file,
                ]);
            }
            $profiles->update([
                'npwp' => $request->profile['npwp'],
                'perusahaan' => $request->profile['perusahaan'],
                'alamat' => $request->profile['alamat'],
                'domisili' => $request->profile['domisili'],
                'nib' => $request->profile['nib'],
            ]);
        }


        //Custom Perizinan        
        if ($typeId == 1) {
            $pemohon->penelitian()->first()->update($request->penelitian);
        } else if ($typeId == 2) {
            $pemohon->penelitian()->first()->update($request->penelitian);
        } else if ($typeId == 3) {
            $pemohon->penelitian()->first()->update($request->penelitian);
            if($request->peneliti != null){
                foreach ($request->peneliti as $penelitiData) {
                    $penelitiId = $penelitiData['id'];
                    $pemohon->peneliti()->where('id', $penelitiId)->first()->update($penelitiData);
                }
            }
        } else if ($typeId == 4) {
            $pemohon->type_rpk()->first()->update($request->type_rpk);
        } else if ($typeId == 5) {
            $pemohon->type_rpk_roro()->first()->update($request->type_rpk_roro);
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
