<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Home;

class HomeController extends Controller
{
    public function index()
    {
    	return view('admin.home.index');
    }

    public function indexSave(Request $request)
    {

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
