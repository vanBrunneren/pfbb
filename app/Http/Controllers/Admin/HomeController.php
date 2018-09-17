<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::first();
    	return view('admin.home.index', compact('home'));
    }

    public function indexSave(Request $request)
    {

        $home = Home::first();
        $home->actual = nl2br($request->input('aktuelles'));
        $home->save();

        if($request->file('file')) {
            //$home = new Home();
            $home = Home::first();
            $file = $request->file('file');
            $path = $file->storeAs('/home', $file->getClientOriginalName(), 'public');
            $home->image = $path;
            $home->save();
        }

        return redirect(route('admin_home'));
    }

    public function logout()
    {
    	\Auth::logout();
    	return redirect('/');
    }
}
