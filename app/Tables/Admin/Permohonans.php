<?php

namespace App\Tables\Admin;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\AllowedFilter;

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
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('user.name', 'LIKE', "%{$value}%");
                });
            });
        });

        $yearFilter = AllowedFilter::callback('year', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereYear('created_at', $value);
                });
            });
        });

        $monthFilter = AllowedFilter::callback('month', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query->whereMonth('updated_at', $value);
                });
            });
        });

        return QueryBuilder::for(Permohonan::class)
        ->defaultSort('id')
        ->allowedFilters(['user.id','izin.jenis_izin.id', 'izin.sektor.nama_sektor', $yearFilter, $monthFilter, $globalSearch]);
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
            ->column(key: 'user.nik', sortable: true, label: 'NIK')
            ->column(key: 'perizinan.nama_perizinan', sortable: true, label: 'Jenis Izin')
            ->column(key: 'perizinan.sektor.nama_sektor', sortable: true, label: 'Sektor')
            ->column(key: 'created_at', sortable: true, label: 'Tanggal Pengajuan', as: fn ($created_at) => $created_at->isoFormat('D MMMM Y'))
            ->column(key: 'updated_at', sortable: true, label: 'Tanggal Selesai', as: fn ($created_at) => $created_at->isoFormat('D MMMM Y'))
            ->column(key: 'no_izin', sortable: true, label: 'Nomor Izin')
            ->column(key: 'status_permohonan.nama_status', sortable: true, label: 'Status Permohonan')
            ->paginate(5)
            ->export()
            ->selectFilter(key: 'year', options: ['2025' => '2025', '2024' => '2024', '2023' => '2023', '2022' => '2022', '2021' => '2021'], label: 'Tahun Izin', noFilterOptionLabel: '-')
            ->selectFilter(key: 'month', options: ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'], label: 'Bulan Izin', noFilterOptionLabel: '-');

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
