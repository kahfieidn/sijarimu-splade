<?php

namespace App\Tables\Admin;

use App\Models\Perizinan;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Perizinans extends AbstractTable
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
        return Perizinan::query();
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
        ->column(key: 'nama_perizinan', sortable: true, label: 'Nama Perizinan')
        ->column(key: 'sektor.nama_sektor', sortable: true, label: 'Sektor')
        ->column(key: 'jenis_izin.nama_izin', sortable: true, label: 'Jenis Izin')
        ->column(key: 'status', sortable: true, label: 'Status')
        ->column(label: 'Actions')
        ->paginate(5)
        ->export();
            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
