<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Videos;

class VideosController extends Controller
{
	public function videos()
	{
		$videos = Videos::all();
		return view('admin.videos.index', compact('videos'));
	}

	public function create(Request $request)
	{

		if($request->isMethod('post')) {

			$videos = new Videos();
			$videos->title = $request->input('title');
			$videos->link = $request->input('link');
			$videos->save();

			return redirect(route('admin_videos'));

		}

		return view('admin.videos.create');
	}

	public function edit(Request $request, $id)
	{
		$video = Videos::where('id', '=', $id)->first();

		if($request->isMethod('post')) {

			$video->title = $request->input('title');
			$video->link = $request->input('link');
			$video->save();

			return redirect(route('admin_videos'));

		}

		return view('admin.videos.edit', compact('video'));
	}

	public function delete($id)
	{
		$video = Videos::where('id', '=', $id)->first();
		$video->delete();
		return redirect(route('admin_videos'));
	}

}
