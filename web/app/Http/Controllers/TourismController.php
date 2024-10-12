<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tourism', [
            'current_page' => 'tourism',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('admin.tourism', [
            'current_page' => 'tourism',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('details.tourism', [
            'current_page' => 'tourism',
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
