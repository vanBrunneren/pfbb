@extends('layouts.admin.app')
@section('title', 'Bilder')
@section('content')
<input type="hidden" id="album_id" value="{{ $id }}" />
<div class="container admin-container">
    <div class="row">
		<div class="col-12">
			<div class="form-group">
				<a href="{{ route('admin_gallery_images_albums_images_upload', $id) }}">
					<button type="button" class="btn btn-success">Bilder hochladen</button>
				</a>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
           	<table class="table">
				<thead>
					<tr>
						<th style="width: 8.333%">
							Titelbild
						</th>
						<th>
							Vorschau
						</th>
						<th>
						</th>
					</tr>
				</thead>
				<tbody>
            	@foreach($images as $image)
            		<tr>
            			<td><input type="radio" name="title" value="{{ $image->path }}" class="titleimage" /></td>         
            			<td><img src="<?=Image::url( '/storage/'.$image->path,100,100,array('crop'))?>" /></td>  		
	            		<td class="list-icon-container">
							<a class="list-icon" href="{{ route('admin_gallery_images_albums_image_delete', $image->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
            	@endforeach
            </div>
        </div>
    </div>
</div>
@endsection
