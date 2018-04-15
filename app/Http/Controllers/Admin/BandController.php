<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ContentHistory;
use App\BandMember;
use App\BandGenre;

class BandController extends Controller
{

    public function index()
    {
        return view('admin.band.index');
    }

    public function history()
    {
        $historys = ContentHistory::get();
    	return view('admin.band.history.index', compact('historys'));
    }

    public function historyCreate()
    {
        return view('admin.band.history.create');
    }

    public function historyCreateSave(Request $request)
    {

        $history = new ContentHistory;
        $history->title = $request->input('title');
        $history->description = $request->input('description');
        $history->entry_status = $request->input('entry_status');
        $history->save();

        return redirect()->route('admin_history');
    }

    public function historyEdit($id)
    {
        $history = ContentHistory::where('id', $id)->first();
        return view('admin.band.history.edit', compact('history'));
    }

    public function historyEditSave(Request $request, $id)
    {
        $history = ContentHistory::where('id', $id)->first();
        $history->title = $request->input('title');
        $history->description = $request->input('description');
        $history->entry_status = $request->input('entry_status');
        $history->save();

        return back();
    }

    public function historyDelete($id)
    {
        $history = ContentHistory::where('id', $id)->first();
        $history->entry_status = 'deleted';
        $history->save();
        return back();
    }





    public function members()
    {
        $all_genres = BandGenre::all();
        $genres = array();
        foreach($all_genres as $gen) {
            $genres[$gen['id']] = $gen['name'];
        }
        $members = BandMember::where('entry_status', array('public', 'hidden'))->get();
    	return view('admin.band.members.index', compact('members', 'genres'));
    }

    public function membersCreate()
    {
        $genres = BandGenre::all();
        return view('admin.band.members.create', compact('genres'));
    }

    public function membersCreateSave(Request $request)
    {
        $member = new BandMember;
        $member->prename = $request->input('prename');
        $member->name = $request->input('name');
        $member->genre = $request->input('genre');
        $member->save();

        return redirect()->route('admin_members');

    }

    public function memberEdit($id)
    {
        $genres = BandGenre::all();
        $member = BandMember::where('id', $id)->first();
        return view('admin.band.members.edit', compact('member', 'genres'));
    }

    public function memberEditSave(Request $request, $id)
    {
        $member = BandMember::where('id', $id)->first();
        $member->prename = $request->input('prename');
        $member->name = $request->input('name');
        $member->genre = $request->input('genre');

        if($request->file('file')) {
            $file = $request->file('file');
            $path = $file->storeAs('/member', $file->getClientOriginalName(), 'public');
            $member->image = $path;
        }

        $member->save();

        return redirect()->route('admin_members');
    }

    public function memberDelete($id)
    {
        $member = BandMember::where('id', $id)->first();
        $member->entry_status = 'deleted';
        $member->save();
        return back();
    }






    public function repertoire()
    {
    	return view('admin.band.repertoire.index');
    }

    public function contact()
    {
    	return view('admin.band.contact.index');
    }
}
