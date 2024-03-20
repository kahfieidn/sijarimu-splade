<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Tables\Admin\Permohonans;
use App\Http\Controllers\Controller;
use App\Tables\Admin\Penelitian\Permohonans as Penelitians;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $getLifecycle = $request->lifecycle;

        return view('admin.index', [
            'permohonans' => Permohonans::class,
            'penelitians' => Penelitians::class,
            'getLifecycle' => $getLifecycle,
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
