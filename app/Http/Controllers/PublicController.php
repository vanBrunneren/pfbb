<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentHistory;
use App\BandMember;
use App\BandGenre;
use App\Events;
use App\Albums;
use App\GalleryImages;
use App\Links;
use App\Videos;
use App\Presse;
use App\Repertoire;
use App\Home;

class PublicController extends Controller
{
    public function home()
    {
        $home = Home::first();
        $events = Events::where('isExtern', '=', 1)->orderBy('date', 'desc')->limit(3)->get();
    	return view('public.home', compact('events', 'home'));
    }

    public function history()
    {
        $history = ContentHistory::where('entry_status', 'public')->get();
    	return view('public.band.history', compact('history'));
    }

    public function members()
    {
        $all_genres = BandGenre::all();
        $genres = array();
        foreach($all_genres as $gen) {
            $genres[$gen['id']] = $gen['name'];
        }
        $members = BandMember::select('*', 'band_genres.name as genre_name', 'band_members.name as name')
            ->where('entry_status', 'public')
            ->join('band_genres', 'band_genres.id', '=', 'band_members.genre')
            ->orderBy('band_genres.id')
            ->get();

    	return view('public.band.members', compact('members', 'genres'));
    }

    public function repertoire()
    {
        $repertoire = Repertoire::all();
    	return view('public.band.repertoire', compact('repertoire'));
    }

    public function contact()
    {
    	return view('public.band.contact');
    }

    public function events($year = null)
    {
        if(!$year) $year = date("Y");
        $events = Events::where([
            ['isExtern', '=', 1],
            ['date', '>=', date("Y-m-d H:i:s", strtotime($year."-01-01 00:00:00"))],
            ['date', '<=', date("Y-m-d H:i:s", strtotime($year."-12-31 00:00:00"))]
        ])->orderBy('date', 'asc')->get();

        return view('public.events', compact('year', 'events'));
    }

    public function pictures()
    {
        $albums = Albums::orderBy('sort', 'desc')->get();
        return view('public.gallery.pictures', compact('albums'));
    }

    public function detailPicture($album)
    {
        $album = Albums::where('keyword', '=', $album)->first();
        $images = GalleryImages::where('album_id', '=', $album->id)->get();
        return view('public.gallery.detailPicture', compact('images', 'album'));
    }

    public function videos()
    {
        $videos = Videos::all();
        return view('public.gallery.videos', compact('videos'));
    }

    public function press()
    {
        $presse = Presse::all();
        return view('public.gallery.press', compact('presse'));
    }

    public function links()
    {
        $links = Links::all();
        return view('public.links', compact('links'));
    }

    public function vorverkauf()
    {
        return view('public.vorverkauf');
    }

    public function vorverkaufSend(Request $request)
    {
        if($request->input('inputAdults') || $request->input('inputChildren')) {

                if($request->input('inputEmail')) {

                    $message = "Name: \t".$request->input('inputName') . "<br>";
                    $message .= "Vorname: \t".$request->input('inputPrename') . "<br>";
                    $message .= "Strasse / Nr: \t".$request->input('inputStreet') . "<br>";
                    $message .= "PLZ / Ort: \t".$request->input('inputPLZ') . " " . $request->input('inputCity') . "<br>";
                    $message .= "Tel.: \t".$request->input('inputPhone') . "<br>";
                    $message .= "Mail: \t".$request->input('inputEmail') . "<br>";
                    $message .= "Tickets Erwachsene: \t".$request->input('inputAdults') . "<br>";
                    $message .= "Tickets Jugendliche: \t".$request->input('inputChildren') . "<br>";
                    $message .= "Platz im Saal: \t". ($request->input('exampleRadios') == "option1" ? "Vorne" : "Hinten") . "<br>";
                    $message .= "Bemerkung: \t".$request->input('inputBemerkungen') . "<br>";

                    $header = array(
                        'From' => 'PigFarmers on Stage <admin@pigfarmers.ch>',
                        'Reply-To' => 'admin@pigfarmers.ch',
                        'X-Mailer' => 'PHP/' . phpversion(),
                        'Content-Type' => 'text/html; charset=UTF-8'
                    );

                    mail('pascal.brunner@gmx.ch', "PigFarmers on Stage", $message, $header);
                    mail('studer@slp.ch', "Abmeldung PigFarmers", $message, $header);


                    $new_message = "Vielen Dank für Ihre Reservierung, diese wurde wie folgt an uns gesendet: <br><br>".$message;
                    mail($request->input('inputEmail'), "PigFarmers on Stage Reservierung", $new_message, $header);

                    return redirect(route('home'));

                }

        }

        return back();

    }

    public function contactSave(Request $request)
    {

        if($request->input('email') && $request->input('message')) {

            $message = "Name: \t".$request->input('name') . "<br>";
            $message .= "Vorname: \t".$request->input('prename') . "<br>";
            $message .= "Tel.: \t".$request->input('phone') . "<br>";
            $message .= "Mail: \t".$request->input('email') . "<br>";
            $message .= "Nachricht: \t".$request->input('message') . "<br>";

            $header = array(
                'From' => 'PigFarmers Kontaktformular <admin@pigfarmers.ch>',
                'Reply-To' => 'admin@pigfarmers.ch',
                'X-Mailer' => 'PHP/' . phpversion(),
                'Content-Type' => 'text/html; charset=UTF-8'
            );

            //mail('pascal.brunner@gmx.ch', "PigFarmers Kontaktformular", $message, $header);
            mail('studer@slp.ch', "Abmeldung PigFarmers", $message, $header);

        }

        return redirect(route('home'));

    }

}
