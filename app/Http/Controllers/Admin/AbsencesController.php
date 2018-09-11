<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events;
use App\Absences;
use Auth;

class AbsencesController extends Controller
{
    public function index(Request $request)
    {

    	$events = Events::where('date', '>=', date('Y-m-d 00:00:00'))->orderBy('date')->get();
        $absences = Absences::where('user_id', '=', \Auth::user()->id)->get();

    	if($request->isMethod('post')) {

    		foreach($request->input('id') as $id) {

    			if(Absences::where([
                    ['user_id', '=', \Auth::user()->id],
                    ['event_id', '=', $id]
                ])->first()) {

    				if(!$request->input('absence_'.$id)) {
    					$absence = Absences::where('user_id', \Auth::user()->id)->where('event_id', $id)->first();
    					$absence->delete();
    				}

                } else {

                	if($request->input('absence_'.$id)) {
    					$absence = new Absences;
    					$absence->user_id = \Auth::user()->id;
    					$absence->event_id = $id;
    					$absence->reason = $request->input('reason_'.$id);
    					$absence->save();
    				}

                }

    		}

            $user_absences = Absences::
                                join('events', 'events.id', '=', 'user_to_events.event_id')
                                ->where('user_id', '=', Auth::user()->id)
                                ->get();

            $message = "".Auth::user()->prename." ".Auth::user()->name." hat seine Absenzen geändert.<br><br>Die Absenzen sind:<br>";

            foreach($user_absences as $abs) {
                $message .= date('d.m.Y', strtotime($abs->date)) . " " . $abs->name . " " . $abs->reason . "<br>";
            }

            $header = array(
                'From' => 'PigFarmers Abmeldung <noreplay@pigfarmers.ch>',
                'Reply-To' => 'admin@pigfarmers.ch',
                'X-Mailer' => 'PHP/' . phpversion(),
                'Content-Type' => 'text/html; charset=UTF-8'
            );

            mail('pascal.brunner@gmx.ch', "Abmeldung PigFarmers", $message, $header);
            mail('studer@slp.ch', "Abmeldung PigFarmers", $message, $header);
            mail('brunnerhp@gmx.ch', "Abmeldung PigFarmers", $message, $header);

            return redirect('admin/absenzen/index');

    	}

        $all_events = array();
        foreach($events as $event) {

            $all_events[$event->id] = array(
                'event' => $event,
            );

            foreach($absences as $absence) {
                if($event->id == $absence->event_id) {
                    $all_events[$event->id]['absence'] = $absence;
                }
            }

        }

    	return view('admin.absences.index', compact('all_events'));

    }

    public function show()
    {
        $events = Events::where('date', '>=', date('Y-m-d 00:00:00'))->orderBy('date')->get();
        $all_events = array();

        foreach($events as $event) {

            $absences = Absences::where('event_id', '=', $event->id)
                                    ->join('users', 'users.id', '=', 'user_to_events.user_id')
                                    ->get();
            $all_events[$event->id] = array(
                'event' => $event,
                'absences' => $absences
            );

        }

        return view('admin.absences.show', compact('all_events'));
    }

}
