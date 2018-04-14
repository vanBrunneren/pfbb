@extends('layouts.admin.app')
@section('title', 'Galerie - Bilder - Alben')
@section('content')
<div class="container admin-container">
    <div class="row">
		<div class="col-12">
			<div class="form-group">
				<a href="{{ route('admin_gallery_images_albums_create') }}">
					<button type="button" class="btn btn-success">Neuer Eintrag</button>
				</a>
			</div>
		</div>
	</div>
    <div class="row">
        <div class="col-12">
           	<table class="table">
				<thead>
					<tr>
						<th style="width:  8.33%">
							Reihenfolge
						</th>
						<th>
							Name
						</th>
						<th>
						</th>
					</tr>
				</thead>
				<tbody>
            	@foreach($albums as $album)
            		<tr>
            			<td>
            				<a class="list-icon" href="{{ route('admin_gallery_images_albums_up', $album->id) }}"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
							<a class="list-icon" href="{{ route('admin_gallery_images_albums_down', $album->id) }}"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
            			</td>
	            		<td>{{ $album->title }}</td>
	            		<td class="list-icon-container">
							<a class="list-icon" href="{{ route('admin_gallery_images_albums_images', $album->id) }}"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
							<a class="list-icon" href="{{ route('admin_gallery_images_albums_edit', $album->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a class="list-icon" href="{{ route('admin_gallery_images_albums_delete', $album->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
            	@endforeach
            </div>
        </div>
    </div>
</div>
@endsection
