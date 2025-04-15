<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all event types from the database
        $eventTypes = EventType::all();

        // Pass the eventTypes data to the view
        return view('event-types.index', compact('eventTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string',
        ]);

        // Create a new EventType using the validated data
        EventType::create($request->all());

        return redirect()->route('event-type.index')->with('success', 'Added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventType $eventType)
    {
        // Pass the single eventType to the edit view
        return view('event-types.edit', compact('eventType'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventType $eventType)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string',
        ]);

        // Update the eventType with the new name
        $eventType->update([
            'name' => $request->name,
        ]);

        return redirect()->route('event-type.index')->with('success', 'Event type name updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $eventType)
    {
        // Delete the eventType
        $eventType->delete();

        return redirect()->route('event-type.index')->with('success', 'Event is deleted');
    }
}
