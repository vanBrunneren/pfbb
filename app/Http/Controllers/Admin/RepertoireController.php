<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repertoire;

class RepertoireController extends Controller
{
	public function repertoire()
	{
		$repertoire = Repertoire::all();
		return view('admin.repertoire.index', compact('repertoire'));
	}

	public function create(Request $request)
	{

		if($request->isMethod('post')) {

			$repertoire = new Repertoire();
			$repertoire->title = $request->input('title');
			$repertoire->text = $request->input('text');
			$repertoire->save();

			return redirect(route('admin_repertoire'));

		}

		return view('admin.repertoire.create');
	}

	public function edit(Request $request, $id)
	{
		$repertoire = Repertoire::where('id', '=', $id)->first();

		if($request->isMethod('post')) {

			$repertoire->title = $request->input('title');
			$repertoire->text = $request->input('text');
			$repertoire->save();

			return redirect(route('admin_repertoire'));

		}

		return view('admin.repertoire.edit', compact('repertoire'));
	}

	public function delete($id)
	{
		$repertoire = Repertoire::where('id', '=', $id)->first();
		$repertoire->delete();
		return redirect(route('admin_repertoire'));
	}

}
