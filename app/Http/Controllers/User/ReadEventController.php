<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReadEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Auth;

class ReadEventController extends Controller
{
    public function show(){
        $events = Event::all();
        return view('user.events.index',compact('events'));
    }
    
    public function read($id)
    {
        $event = Event::find($id);
        $countreadevent = ReadEvent::checkEvent($id);
        if($countreadevent == 0){
           $readevent = new ReadEvent();
           $readevent->student_id = Auth::user()->id;
           $readevent->event_id = $id;
           $readevent->save();
        }
        return view('user.readEvent.index',compact('event'));
    }

}
