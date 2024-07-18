<?php

namespace App\Http\Controllers;

use App\Models\MapLocation;
use Illuminate\Http\Request;

class MapLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapLocations = MapLocation::all();
        return view('pages.map-location', ['mapLocations' => $mapLocations]);
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
        // Validate the request
        // $request->validate([
        //     'nama_gambar' => 'required|string',
        //     'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk gambar
        // ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
        } else {
            return redirect()->back()->with('error', 'File gambar tidak ditemukan.');
        }

        $mapLocation = new MapLocation();
        $mapLocation->nama_gambar = $request->input('nama_gambar');
        $mapLocation->gambar = $imageName;
        $mapLocation->save();

        return redirect()->route('mapLocation.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $mapLocation = MapLocation::find($id);
        return view('form.edit-maplocation', ['mapLocation' => $mapLocation]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $mapLocation = MapLocation::find($id);
        return response()->json($mapLocation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        info($request);
        $mapLocation = MapLocation::find($id);
        $mapLocation->update($request->all());
        return redirect()->route('mapLocation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        MapLocation::destroy($id);
        return redirect()->route('mapLocation.index');
    }
}
