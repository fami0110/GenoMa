<?php

namespace App\Http\Controllers;

use App\Models\Culinary;
use Illuminate\Http\Request;

class CulinaryController extends Controller
{
    /**
     * Display an index pages.
     */
    public function index()
    {
        return view('pages.culinary', [
            'current_page' => 'culinary',
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        return view('admin.culinary', [
            'current_page' => 'culinary',
        ]);
    }

    /**
     * Get the specified resource.
     */
    public function get(string $id)
    {
        return json_encode(Culinary::find($id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Culinary::find($id);

        return view('details.culinary', [
            'data' => $data,
            'current_page' => 'culinary',
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
