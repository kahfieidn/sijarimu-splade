<?php

namespace App\Http\Controllers\Persyaratan;

use App\Models\Perizinan;
use App\Tables\Perizinans;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use App\Http\Controllers\Controller;
use App\Models\Persyaratan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('persyaratan.index', [
            'perizinans' => Perizinans::class
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
    public function show(Perizinan $perizinan)
    {
        $persyaratan = Persyaratan::where('perizinan_id', $perizinan->id)->get();
        //
        $data = [
            'perizinan' => $perizinan,
            'persyaratan' => $persyaratan,
            'sektor' => $perizinan->sektor
        ];
        $pdf = FacadePdf::loadView('cetak.persyaratan-request', $data);
        $customPaper = array(0, 0, 609.4488, 935.433);
        $pdf->set_paper($customPaper);
        $pdf->render();

        return $pdf->stream('test' .'.pdf');
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
