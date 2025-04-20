<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventType;


class EventController extends Controller
{
    function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }
    public function create()
    {
        // Retrieve all event types
        $eventTypes = EventType::all();

        // Pass event types to the view
        return view('events.create', compact('eventTypes'));
    }

    function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'event_type_id' => 'required|exists:event_types,id',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            'venue' => 'required|string|max:255',
            'details' => 'required|string',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'registration_fee' => 'nullable|numeric|min:0',
            'is_public' => 'required|boolean',
            'is_active' => 'required|boolean',
        ]);
        $data = $request->all();
        $data['host_user_id'] = Auth::user()->id;
        // dd($data);
        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Added successfully');
    }

    function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'event_type_id' => 'required|exists:event_types,id',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            'venue' => 'required|string|max:255',
            'details' => 'required|string',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'registration_fee' => 'nullable|numeric|min:0',
            'is_public' => 'required|boolean',
            'is_active' => 'required|boolean',
        ]);
        $event->update([
            'title' => $request->title,
            'event_type_id' => $request->event_type_id,
            'start_datetime' => $request->start_datetime,
            'end_datetime' => $request->end_datetime,
            'venue' => $request->venue,
            'details' => $request->details,
            'banner' => $request->banner,
            'registration_fee' => $request->registration_fee,
            'is_public' => $request->is_public,
            'is_active' => $request->is_active
        ]);


        return redirect()->route('events.index')->with('success', 'Updated Successfully');
    }
    public function edit(Event $event)
    {
        // Retrieve all event types
        $eventTypes = EventType::all();

        // Pass both the event and event types to the view
        return view('events.edit', compact('event', 'eventTypes'));
    }

    function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted');
    }
}
