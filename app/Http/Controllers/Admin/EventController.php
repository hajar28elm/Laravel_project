<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
class EventController extends Controller
{
    
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index',compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->contenu = $request->input('contenu');
        $event->name = $request->input('name');
        $event->longcontent = $request->input('longcontent');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $event->img = $fileName;
        }
        $event->save();
        return redirect()->route('admin.events.index')
          ->with('success','Event created successfully');
    }

    public function show(Event $event)
    {
        //
    }
    public function edit(Event $event)
    {
        return view('admin.events.edit',compact('event'));
    }

  
    public function update(Request $request, Event $event)
    {
        $request->validate([

        ]);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $event->img = $fileName;
        }
        $event->update($request->all());
        return redirect()->route('admin.events.index')
             ->with('success','event updated successfully');
    }

   
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
             ->with('success','event deleted successfully'); 
    }
}
