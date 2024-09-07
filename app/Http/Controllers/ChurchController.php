<?php

namespace App\Http\Controllers;

use App\Models\Church;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChurchController extends Controller
{
    /**
     * Display a listing of the Churches.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Churches = Church::all();
        return Inertia('Churches/index', compact('Churches'));
    }

    /**
     * Show the form for creating a new church.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia('Churches/create');
    }

    /**
     * Store a newly created church in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        Church::create($request->all());

        return redirect()->route('Churches.index')->with('success', 'Church created successfully.');
    }

    /**
     * Display the specified church.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
        return Inertia('Churches/show', compact('church'));
    }

    /**
     * Show the form for editing the specified church.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit(Church $church)
    {
        return Inertia('Churches/edit', compact('church'));
    }

    /**
     * Update the specified church in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Church $church)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);
        $church->update($request->all());
        return redirect()->route('Churches.index')->with('success', 'Church updated successfully.');
    }

    /**
     * Remove the specified church from the database.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church)
    {
        $church->delete();
        return redirect()->route('Churches.index')->with('success', 'Church deleted successfully.');
    }
}
