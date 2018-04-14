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

class PublicController extends Controller
{
    public function home()
    {
        $events = Events::where('isExtern', '=', 1)->limit(3)->get();
    	return view('public.home', compact('events'));
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

}
