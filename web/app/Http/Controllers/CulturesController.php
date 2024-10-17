<?php

namespace App\Http\Controllers;

use App\Models\Cultures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Facades\Purifier;

class CulturesController extends Controller
{
    /**
     * Get validation rules
     */
    protected function getValidationRules($create = false) {
        return [
            'name' => 'required|string|max:50',
            'category' => 'required|numeric',
            'cover' => ($create ? 'required|' : '') . 'image|max:2048', 
            'content' => 'required|string',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cultures::get();

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
        $data = Cultures::get();

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
        return json_encode(Cultures::find($id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Cultures::find($id);

        return view('details.cultures', [
            'data' => $data,
            'current_page' => 'cultures',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data = $req->validate(
            $this->getValidationRules(true)
        );

        // Store files
        $req->file('cover')->store('cultures');
        $data['cover'] = $req->file('cover')->hashName();

        // Purify content
        $data['content'] = Purifier::clean($data['content']);

        Cultures::create($data);

        return redirect('/admin/cultures')->with('success', "Data successfully created!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $old = Cultures::find($id);

        $data = $req->validate(
            $this->getValidationRules()
        );

        // Update files if available
        if (isset($data['cover'])) {
            Storage::delete('cultures/'. $old->cover);
            $req->file('cover')->store('cultures');
            $data['cover'] = $req->file('cover')->hashName();
        } else {
            $data['cover'] = $old->cover;
        }

        // Purify content
        $data['content'] = Purifier::clean($data['content']);

        $old->update($data);

        return redirect('/admin/cultures')->with('success', "Data successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Cultures::find($id);

        // Delete cover
        Storage::delete('cultures/'. $data->cover);

        // Delete data
        $data->delete();

        return redirect('/admin/cultures')->with('success', "Data successfully deleted!");
    }
}
