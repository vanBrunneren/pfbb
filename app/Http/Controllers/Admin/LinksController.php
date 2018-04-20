<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Links;

class LinksController extends Controller
{
	public function links()
	{
		$links = Links::all();
		return view('admin.links.index', compact('links'));
	}

	public function create(Request $request)
	{

		if($request->isMethod('post') && $request->input('title') && $request->input('link')) {

			$link = new Links();
			$link->title = $request->input('title');
			$link->link = $request->input('link');
			$link->save();

			return redirect(route('admin_links'));

		}

		return view('admin.links.create');
	}

	public function edit(Request $request, $id)
	{
		$link = Links::where('id', '=', $id)->first();

		if($request->isMethod('post')) {

			$link->title = $request->input('title');
			$link->link = $request->input('link');
			$link->save();

			return redirect(route('admin_links'));

		}

		return view('admin.links.edit', compact('link'));
	}

	public function delete($id)
	{
		$link = Links::where('id', '=', $id)->first();
		$link->delete();
		return redirect(route('admin_links'));
	}

}
