<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tourism::orderBy('is_recomended')->get();

        return view('pages.tourism', [
            'data' => $data,
            'current_page' => 'tourism',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $data = Tourism::orderBy('is_recomended')->get();

        return view('admin.tourism', [
            'data' => $data,
            'current_page' => 'tourism',
        ]);
    }

    /**
     * Get the specified resource.
     */
    public function get(string $id)
    {
        return json_encode(Tourism::where('id', $id)->first());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tourism::where('id', $id)->first();

        return view('details.tourism', [
            'data' => $data,
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
