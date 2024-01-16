<?php

namespace App\Tables\BackOffice;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

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
        return Permohonan::query()->where('status_permohonan_id', 4)->orWhere('status_permohonan_id', 5);
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
            ->withGlobalSearch(columns: ['user.name', 'perizinan.nama_perizinan', 'status_permohonan.nama_status'])
            ->column(key: 'id', sortable: true, label: 'ID')
            ->column(key: 'user.name', sortable: true, label: 'Nama Pemohon')
            ->column(key: 'perizinan.nama_perizinan', sortable: true, label: 'Jenis Izin')
            ->column(key: 'perizinan.sektor.nama_sektor', sortable: true, label: 'Sektor')
            ->column(key: 'status_permohonan.nama_status', sortable: true, label: 'Status Permohonan')
            ->column(key: 'created_at', sortable: true, label: 'Tanggal Pengajuan', as: fn ($created_at) => $created_at->isoFormat('D MMMM Y'))
            ->rowLink(fn (Permohonan $pemohon) => route('back-office.show', $pemohon->id))
            ->column('actions')
            ->paginate(5);


        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
