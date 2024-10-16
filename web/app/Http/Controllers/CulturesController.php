<?php

namespace App\Http\Controllers;

use App\Models\Cultures;
use Illuminate\Http\Request;

class CulturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cultures::orderBy('is_recomended')->get();

        return view('pages.cultures', [
            'data' => $data,
            'current_page' => 'cultures',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $data = Cultures::orderBy('is_recomended')->get();

        return view('admin.cultures', [
            'data' => $data,
            'current_page' => 'cultures',
        ]);
    }

    /**
     * Get the specified resource.
     */
    public function get(string $id)
    {
        return json_encode(Cultures::where('id', $id)->first());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Cultures::where('id', $id)->first();

        return view('details.cultures', [
            'data' => $data,
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
