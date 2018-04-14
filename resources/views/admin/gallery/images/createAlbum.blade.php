@extends('layouts.admin.app')
@section('title', 'Album erstellen')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<form method="POST" action="" name="albumsForm">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="title" value="{{ $album->title ? $album->title : '' }}">
					</div>
					<button type="submit" class="btn btn-primary">Speichern</button>
				</form>
			</div>
		</div>
	</div>
@endsection