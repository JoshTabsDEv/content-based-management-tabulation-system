<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller

{
    public function index()
    {
        $events = Event::all();
        return view('pages.dashboard', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date|after_or_equal:event_start_date',
        ]);

        Event::create([
            'event_name' => $request->event_name,
            'event_start_date' => $request->event_start_date,
            'event_end_date' => $request->event_end_date,
        ]);

        return redirect()->route('events.show')->with('success', 'Event added successfully!');
    }

    public function addJudge(){

    }
}
