<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MsmesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.msmes', [
            'current_page' => 'msmes',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('admin.msmes', [
            'current_page' => 'msmes',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('details.msmes', [
            'current_page' => 'msmes',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
