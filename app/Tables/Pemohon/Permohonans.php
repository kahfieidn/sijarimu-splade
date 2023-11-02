<?php

namespace App\Tables\Pemohon;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;

class Permohonans extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Permohonan::query()->where('user_id', Auth::id());
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['user.name', 'perizinan.nama_perizinan'])
            ->column('id', sortable: true)
            ->column('user.name', sortable: true,label: 'Pemohon')
            ->column('perizinan.nama_perizinan', sortable: true, label: 'Jenis Izin')
            ->column('status_permohonan.nama_status', sortable: true, label: 'Status Permohonan')
            ->column('created_at', sortable: true, label:'Tanggal Pengajuan', as: fn($created_at) => $created_at->isoFormat('dddd, D MMMM Y'))
            ->rowSlideover(fn (Permohonan $permohonans) => route('pemohon.show', $permohonans->id))
            ->column('actions')
            ->paginate(5);
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
