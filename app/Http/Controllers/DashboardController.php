<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permohonan_count = Permohonan::count();
        $permohonan_selesai = Permohonan::where('status_permohonan_id', 10)->count();
        $user_count = User::count();
        return view('dashboard', [
            'permohonan_count' => $permohonan_count,
            'permohonan_selesai' => $permohonan_selesai,
            'user_count' => $user_count,
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
    public function show(string $id)
    {
        //
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
