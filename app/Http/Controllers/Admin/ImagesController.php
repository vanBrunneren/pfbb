<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Albums;
use App\GalleryImages;

class ImagesController extends Controller
{
    public function albums()
    {
    	
    	$albums = Albums::orderBy('sort', 'desc')->get();
    	
    	return view('admin.gallery.images.albums', compact('albums'));
    
    }

    public function albumsCreate(Request $request) 
    {

    	$album = new Albums;

    	if($request->isMethod('post')) {

    		$album->title = $request->input('title');
    		
    		$search = array('ä', 'ö', 'ü', ' ', '<', '>', '!', '\\', '/', '%');
    		$replace = array('ae', 'oe', 'ue', '-', '', '', '', '-', '-', '');

            $album->sort = Albums::max('sort') + 1;
    		$album->keyword = strtolower(str_replace($search, $replace, $request->input('title')));
    		$album->save();

    		return redirect(route('admin_gallery_images_albums'));

    	}

    	return view('admin.gallery.images.createAlbum', compact('album'));

    }

    public function albumsEdit(Request $request, $id) 
    {

    	$album = Albums::where('id', '=', $id)->first();

    	if($request->isMethod('post')) {

    		$album->title = $request->input('title');
    		
    		$search = array('ä', 'ö', 'ü', ' ', '<', '>', '!', '\\', '/', '%');
    		$replace = array('ae', 'oe', 'ue', '-', '', '', '', '-', '-', '');
    		$album->keyword = strtolower(str_replace($search, $replace, $request->input('title')));

    		$album->save();

    		return redirect(route('admin_gallery_images_albums'));

    	}

    	return view('admin.gallery.images.createAlbum', compact('album'));

    }

    public function albumsDelete($id)
    {
    	$album = Albums::where('id', '=', $id)->first();
    	$album->delete();
    	return redirect(route('admin_gallery_images_albums'));
    }

    public function albumsImages($id)
    {
    	$images = GalleryImages::where('album_id', '=', $id)->get();
    	return view('admin.gallery.images.albumImages', compact('images', 'id'));
    }

    public function albumsImageDelete($id)
    {
    	$images = GalleryImages::where('id', '=', $id)->first();
    	$album_id = $images->album_id;
    	Storage::delete($images->path);
    	$images->delete();
    	return redirect(route('admin_gallery_images_albums_images', $album_id));
    }

    public function albumsImagesUpload(Request $request, $id)
    {

    	if($request->isMethod('post')) {

    		$album = Albums::where('id', '=', $id)->first();

    		foreach($request->file('files') as $file) {

    			$image = new GalleryImages();

    			$path = $file->storeAs('/gallery/'.$album->keyword, $file->getClientOriginalName(), 'public');
    			$image->path = $path;
    			$image->album_id = $id;
    			$image->save();

    		}

    		return redirect(route('admin_gallery_images_albums_images', $id));

    	}

    	return view('admin.gallery.images.albumImagesUpload', compact('id'));
    }

    public function albusmImagesSetThumb(Request $request, $id)
    {
    	$album = Albums::where('id', '=', $id)->first();
    	$album->thumbImage = $request['thumbImage'];
    	$album->save();
    }

    public function albumsUp($id) 
    {
        $album = Albums::where('id', '=', $id)->first();
        $otherAlbum = Albums::where('sort', '=', $album->sort+1)->first();
        if($album && $otherAlbum) {
            $oldSort = $album->sort;

            $album->sort = $otherAlbum->sort;
            $album->save();

            $otherAlbum->sort = $oldSort;
            $otherAlbum->save();
        }

        return redirect(route('admin_gallery_images_albums'));
    }

    public function albumsDown($id)
    {

        $album = Albums::where('id', '=', $id)->first();
        $otherAlbum = Albums::where('sort', '=', $album->sort-1)->first();
        if($album && $otherAlbum) {
        
            $oldSort = $album->sort;

            $album->sort = $otherAlbum->sort;
            $album->save();

            $otherAlbum->sort = $oldSort;
            $otherAlbum->save();

        }

        return redirect(route('admin_gallery_images_albums'));
    }

}





















































