<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Presse;

class PresseController extends Controller
{
	public function presse()
	{
		$presse = Presse::all();
		return view('admin.presse.index', compact('presse'));
	}

	public function create(Request $request)
	{

		if($request->isMethod('post')) {

            $file = $request->file('file');
            $path = $file->storeAs('/presse', $file->getClientOriginalName(), 'public');

			$presse = new Presse();
			$presse->link = $path;
			$presse->save();

			return redirect(route('admin_presse'));

		}

		return view('admin.presse.create');
	}

    public function delete($id)
    {
    	$presse = Presse::where('id', '=', $id)->first();
    	Storage::delete($presse->link);
    	$presse->delete();
    	return redirect(route('admin_presse'));
    }

}
