<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Tables\Users;
use App\Tables\Perizinans;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;

class ManagementUser extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.management_user.index', [
            'users' => Users::class
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user_role = Role::all();
        return view('admin.management_user.create', [
            'user_role' => $user_role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'nomor_handphone' => 'required',
            'user_role' => 'required'
        ]);
        
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'nomor_handphone' => $request->nomor_handphone,
        ]);
        $user->assignRole($request->user_role);

        Toast::title('User berhasil di tambah!')
        ->rightBottom()
        ->autoDismiss(10);
        return redirect()->route('admin-management-user.index');
        
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
