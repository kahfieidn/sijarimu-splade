<?php

namespace App\Http\Controllers\Admin;

use App\Models\Opd;
use App\Models\User;
use App\Models\Sektor;
use App\Tables\Admin\Opds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;

class ManagementOpd extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.management_opd.index', [
            'opds' => Opds::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.management_opd.create', [
            'sektor_id' => Sektor::all(),
            'user_id' => User::role('opd')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => ['required', 'string', 'max:255'],
            'sektor_id' => ['required', 'string', 'max:255'],
        ]);

        Opd::create([
            'user_id' => $request->user_id,
            'sektor_id' => $request->sektor_id,
            'role_id' => 4,
        ]);

        Toast::title('Opd berhasil di tambah!')
            ->rightBottom()
            ->autoDismiss(10);
        return to_route('admin-management-opd.index');
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
    public function destroy(Opd $opd_id)
    {
        $opd_id->delete();

        Toast::title('Opd berhasil di hapus!')
            ->rightBottom()
            ->autoDismiss(10);
        return back();
    }
}
