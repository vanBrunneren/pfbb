<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;

class NewsController extends Controller
{
    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->get();
    	return view('admin.news.index', compact('news'));
    }

    public function create(Request $request) 
    {

        if($request->isMethod('post')) {

            $news = new News;
            $news->text = $request->input('text');
            $news->date = $request->input('date');

            $file = $request->file('file');
            $path = $file->storeAs('/news', $file->getClientOriginalName(), 'public');

            $news->img = $path;
            $news->save();

            return redirect(route('admin_news'));

        }

        return view('admin.news.create');

    }

    public function edit(Request $request, $id)
    {
        $news = News::where('id', '=', $id)->first();

        if($request->isMethod('post')) {

            $news->text = $request->input('text');
            $news->date = $request->input('date');

            $file = $request->file('file');
            $path = $file->storeAs('/news', $file->getClientOriginalName(), 'public');

            $news->img = $path;
            $news->save();

            return redirect(route('admin_news'));

        }

        return view('admin.news.create', compact('news'));
        
    }

    public function delete(Request $request, $id)
    {
        $news = News::get()->where('id', $id)->first();
        $news->delete();
        return back();
    }

}