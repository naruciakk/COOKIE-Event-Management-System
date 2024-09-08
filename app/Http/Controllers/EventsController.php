<?php

namespace EventTool\Http\Controllers;

use EventTool\Event;
use EventTool\Day;

use Illuminate\Http\Request;

use EventTool\Http\Requests;
use EventTool\Http\Controllers\Controller;

use Auth;
use DB;

class EventsController extends Controller
{

    public function index() {
    	$events = DB::table('events')->where('visible', '=', 1)->get();
    	$days = Day::All();

		return view('event.eventList', compact('events'), compact('days'));
    }

    public function show($id) {
    	$event = Event::findOrFail($id);
    	$day = Day::findOrFail($event->day);
		return view('event.eventShow', compact('event'), compact('day'));
    }

    public function add() {
        if(Auth::check()) {
            return view('event.eventAdd');
        }
        else return redirect('/panel');
    }

    public function addAction(Request $request) {
        if(Auth::check()) {
            $title = $request->input('name');
            $desc = $request->input('desc');

            $user = Auth::user();

            if($title != NULL && $desc != NULL) {
                $event = new Event;
                $event->name = $title;
                $event->desc = $desc;
                $event->creator = $user->name;
                $event->visible = 0;
                $event->save();

                return view('event.eventAddSuccess');
            }
            else return view('event.eventAddError');
        }
        else return redirect('/panel');
    }
}
