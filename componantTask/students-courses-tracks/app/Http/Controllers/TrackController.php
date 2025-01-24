<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }

    public function create()
    {
        return view('tracks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Track::create($request->all());
        return redirect()->route('tracks.index')->with('success', 'Track created successfully.');
    }

    public function edit(Track $track)
    {
        return view('tracks.edit', compact('track'));
    }

    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $track->update($request->all());
        return redirect()->route('tracks.index')->with('success', 'Track updated successfully.');
    }

    public function destroy(Track $track)
    {
        $track->delete();
        return redirect()->route('tracks.index')->with('success', 'Track deleted successfully.');
    }
}