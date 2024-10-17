<?php

namespace App\Http\Controllers;

use App\Models\Msmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MsmesController extends Controller
{
    /**
     * Get validation rules
     */
    protected function getValidationRules($create = false) {
        return [
            'name' => 'required|string|max:50',
            'category' => 'required|numeric',
            'cover' => ($create ? 'required|' : '') . 'image|max:2048', 
            'slider' => 'array|min:1',
            'slider.*' => 'image|max:2048',
            'description' => 'required|string|max:500',
            'link' => 'required|url',
            'address' => 'required|string|max:100',
            'contact' => 'required|string|max:50',
            'longitude' => 'required|string',
            'latitude' => 'required|string',
            'price_min' => 'required|numeric|min:0',
            'price_max' => 'required|numeric|min:0',
            'day' => 'required|array|min:1',
            'day.*' => 'required|string|in:mon,tue,web,thu,fri,sat,sun',
            'time-start' => 'required|array',
            'time-start.*' => 'required|date_format:H:i',
            'time-end' => 'required|array',
            'time-end.*' => 'required|date_format:H:i',
            'rate' => 'required|string',
            'is_recomended' => 'nullable|in:on',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Msmes::orderBy('is_recomended')->get();

        return view('pages.msmes', [
            'data' => $data,
            'current_page' => 'msmes',
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $data = Msmes::orderBy('is_recomended')->get();

        return view('admin.msmes', [
            'data' => $data,
            'current_page' => 'msmes',
        ]);
    }

    /**
     * Get the specified resource.
     */
    public function get(string $id)
    {
        return json_encode(Msmes::find($id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Msmes::find($id);

        return view('details.msmes', [
            'data' => $data,
            'current_page' => 'msmes',
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

        // Rearange the schedules
        $data['schedules'] = [];
        foreach ($data['day'] as $i => $day) {
            $data['schedules'][$day] = [
                'time-start' => $data['time-start'][$i],
                'time-end' => $data['time-end'][$i],
            ];
        }
        unset($data['day']); unset($data['time-start']); unset($data['time-end']);
        $data['schedules'] = json_encode($data['schedules']);

        // Fix the value
        $data['price_min'] = floatval($data['price_min']);
        $data['price_max'] = floatval($data['price_max']);
        $data['longitude'] = floatval($data['longitude']);
        $data['latitude'] = floatval($data['latitude']);
        $data['rate'] = floatval($data['rate']);
        $data['is_recomended'] = isset($data['is_recomended']);

        // Store files
        $req->file('cover')->store('msmes');
        $data['photos'] = [$req->file('cover')->hashName()];
        unset($data['cover']); 

        if (isset($data['slider'])) {
            foreach ($req->file('slider') as $file) {
                $file->store('msmes');
                array_push($data['photos'], $file->hashName());
            }
            unset($data['slider']);
        }

        $data['photos'] = json_encode($data['photos']);


        Msmes::create($data);

        return redirect('/admin/msmes')->with('success', "Data successfully created!");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $old = Msmes::find($id);
        $old_photos = json_decode($old->photos, true);

        $data = $req->validate(
            $this->getValidationRules()
        );

        // Rearange the schedules
        $data['schedules'] = [];
        foreach ($data['day'] as $i => $day) {
            $data['schedules'][$day] = [
                'time-start' => $data['time-start'][$i],
                'time-end' => $data['time-end'][$i],
            ];
        }
        unset($data['day']); unset($data['time-start']); unset($data['time-end']);
        $data['schedules'] = json_encode($data['schedules']);

        // Fix the value
        $data['price_min'] = floatval($data['price_min']);
        $data['price_max'] = floatval($data['price_max']);
        $data['longitude'] = floatval($data['longitude']);
        $data['latitude'] = floatval($data['latitude']);
        $data['rate'] = floatval($data['rate']);
        $data['is_recomended'] = isset($data['is_recomended']);

        // Update files if available
        $old_cover = array_shift($old_photos);

        if (isset($data['cover'])) {
            Storage::delete('msmes/'. $old_cover);
            $req->file('cover')->store('msmes');
            $data['photos'] = [$req->file('cover')->hashName()];
            unset($data['cover']);
        } else {
            $data['photos'] = [$old_cover];
        }

        if (isset($data['slider'])) {
            foreach ($old_photos as $photo)
                Storage::delete('msmes/'. $photo);
            
            foreach ($req->file('slider') as $file) {
                $file->store('msmes');
                array_push($data['photos'], $file->hashName());
            }
            unset($data['slider']); 
        } else {
            foreach ($old_photos as $photo)
                array_push($data['photos'], $photo);
        }
        
        $data['photos'] = json_encode($data['photos']);


        $old->update($data);

        return redirect('/admin/msmes')->with('success', "Data successfully updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Msmes::find($id);

        // Delete all photos
        $photos = json_decode($data->photos);
        foreach ($photos as $photo)
            Storage::delete('msmes/'. $photo);

        // Delete data
        $data->delete();

        return redirect('/admin/msmes')->with('success', "Data successfully deleted!");
    }
}
