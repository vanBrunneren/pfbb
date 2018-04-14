<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events;

class EventsController extends Controller
{
    public function index()
    {
    	$events = Events::where('date', '>=', date('Y-m-d'))->orderBy('date')->get();
    	return view('admin.events.index', compact('events'));
    }

    public function create(Request $request)
    {
    	$event = new Events;
    
    	if($request->isMethod('post')) {

    		$event->name = $request->input('name');
            $event->location = $request->input('location');
            $event->date = date("Y-m-d H:i:s", strtotime($request->input('datetime')));
            if($request->input('public') == "on") {
            	$event->isExtern = true;
            }
            $event->save();

    		return redirect(route('admin_events'));

    	}

    	return view('admin.events.create', compact('event'));
    }

    public function edit(Request $request, $id)
    {
    	$event = Events::get()->where('id', $id)->first();

    	if($request->isMethod('post')) {

    		$event->name = $request->input('name');
            $event->location = $request->input('location');
            $event->date = date("Y-m-d H:i:s", strtotime($request->input('datetime')));
            if($request->input('public') == "on") {
            	$event->isExtern = true;
            } else {
            	$event->isExtern = false;
            }
            $event->save();

    		return redirect(route('admin_events'));

    	}

    	return view('admin.events.edit', compact('event'));
    }

    public function delete(Request $request, $id)
    {
    	$event = Events::get()->where('id', $id)->first();
    	$event->delete();
    	return back();
    }

    public function multisave(Request $request) 
    {
        if(date("Y-m-d") < date("Y-m-d", strtotime($request->input('multisave_date')))) {
            $end_date = date("Y-m-d", strtotime($request->input('multisave_date')));
            
            $today = new \DateTime(date("y-m-d"));            
            if($today->format("w") == 5) {
                $start_date = $today;
            } else {
                if($today->format("w") > 5) {
                    $start_date = $today->add(new \DateInterval('P'.((7 - $today->format("w")) + 5).'D'));
                } else {
                    $start_date = $today->add(new \DateInterval('P'.(5 - $today->format("w")).'D'));
                }
            }

            $new_date = $start_date;
            while($end_date > $new_date->format("Y-m-d")) {

                if(count(Events::where([
                    ['name', '=', 'Probe'],
                    ['location', '=', 'Probelokal'],
                    ['date', '=', $new_date->format("Y-m-d 20:00:00")]
                ])->get()) == 0) {

                    $event = new Events;
                    $event->name = "Probe";
                    $event->location = 'Probelokal';
                    $event->isExtern = false;
                    $event->date = $new_date->format("Y-m-d 20:00:00");
                    $event->save();

                }
                
                $new_date = $new_date->add(new \DateInterval('P7D'));

            }
        }

        return redirect(route('admin_events'));

    }

}


















