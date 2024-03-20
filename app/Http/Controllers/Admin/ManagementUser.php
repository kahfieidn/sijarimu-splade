<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Tables\Users;
use App\Tables\Perizinans;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        dd($request->all());        
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
