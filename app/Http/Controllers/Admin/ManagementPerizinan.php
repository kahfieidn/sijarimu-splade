<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sektor;
use App\Models\JenisIzin;
use App\Models\Perizinan;
use App\Models\Persyaratan;
use Illuminate\Http\Request;
use App\Tables\Admin\Perizinans;
use App\Tables\Admin\Persyaratans;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Support\Collection;

class ManagementPerizinan extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_izin_id = JenisIzin::all();
        $sektor_id = Sektor::all();
        return view('admin.management_perizinan.index', [
            'jenis_izin_id' => $jenis_izin_id,
            'sektor_id' => $sektor_id,
            'perizinans' => Perizinans::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.management_perizinan.create', [
            'jenis_izin_id' => JenisIzin::all(),
            'sektor_id' => Sektor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perizinan' => ['required', 'string', 'max:255'],
            'sektor_id' => ['required', 'string', 'max:255'],
            'jenis_izin_id' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Perizinan::create([
            'nama_perizinan' => $request->nama_perizinan,
            'sektor_id' => $request->sektor_id,
            'jenis_izin_id' => $request->jenis_izin_id,
            'status' => $request->status
        ]);

        Toast::title('Perizinan berhasil di tambah!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-perizinan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perizinan $perizinan_id)
    {
        //

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('nama_persyaratan', 'LIKE', "%{$value}%");
                });
            });
        });

        $persyaratan = Persyaratan::where('perizinan_id', $perizinan_id->id)->get();
        $persyaratans = QueryBuilder::for(Persyaratan::query()->where('perizinan_id', $perizinan_id->id))
            ->allowedFilters(['nama_peryaratan', 'id', $globalSearch]);;

        return view('admin.management_perizinan.show', $perizinan_id, [
            'persyaratan' => $persyaratan,
            'persyaratans' => SpladeTable::for($persyaratans)
                ->withGlobalSearch()
                ->column(key: 'id', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'nama_persyaratan', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'status', searchable: true, sortable: true, canBeHidden: false)
                ->column(key: 'deskripsi', searchable: true, sortable: true, canBeHidden: false)
                ->column(label: 'Actions')
                ->paginate(15),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perizinan $perizinan_id)
    {
        //
        return view('admin.management_perizinan.edit', $perizinan_id, [
            'perizinan' => $perizinan_id,
            'jenis_izin' => JenisIzin::all(),
            'sektor' => Sektor::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perizinan $perizinan_id)
    {
        //
        $perizinan_id->update([
            'nama_perizinan' => $request->perizinan['nama_perizinan'],
            'sektor_id' => $request->perizinan['sektor_id'],
            'jenis_izin_id' => $request->perizinan['jenis_izin_id'],
            'status' => $request->perizinan['status']
        ]);

        Toast::title('Perizinan berhasil di tambah!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-perizinan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perizinan $perizinan_id)
    {
        //

        $persyaratan = Persyaratan::where('perizinan_id', $perizinan_id->id)->get();
        $persyaratan->each->delete();
        $perizinan_id->delete();

        Toast::title('Perizinan berhasil di hapus!')
            ->rightBottom()
            ->autoDismiss(10);
        return back();
    }
}
