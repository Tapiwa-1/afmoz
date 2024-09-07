<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use App\Models\Church;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeaderController extends Controller
{
    /**
     * Display a listing of the leaders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaders = Leader::with('church')->get();
        return Inertia('Leaders/index', compact('leaders'));
    }

    /**
     * Show the form for creating a new leader.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $churches = Church::all(); // Get all churches to associate with a leader
        return Inertia('Leaders/create', compact('churches'));
    }

    /**
     * Store a newly created leader in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'church_id' => 'required|exists:churches,id',
        ]);

        Leader::create($request->all());

        return redirect()->route('leaders.index')->with('success', 'Leader created successfully.');
    }

    /**
     * Display the specified leader.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function show(Leader $leader)
    {
        return Inertia('Leaders/show', compact('leader'));
    }

    /**
     * Show the form for editing the specified leader.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function edit(Leader $leader)
    {
        $churches = Church::all();
        return Inertia('Leaders/edit', compact('leader', 'churches'));
    }

    /**
     * Update the specified leader in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leader $leader)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'church_id' => 'required|exists:churches,id',
        ]);

        $leader->update($request->all());

        return redirect()->route('leaders.index')->with('success', 'Leader updated successfully.');
    }

    /**
     * Remove the specified leader from the database.
     *
     * @param  \App\Models\Leader  $leader
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leader $leader)
    {
        $leader->delete();

        return redirect()->route('leaders.index')->with('success', 'Leader deleted successfully.');
    }
}
