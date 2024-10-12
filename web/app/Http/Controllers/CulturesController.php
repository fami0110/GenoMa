<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CulturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.cultures', [
            'current_page' => 'cultures',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('admin.cultures', [
            'current_page' => 'cultures',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('details.cultures', [
            'current_page' => 'cultures',
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
