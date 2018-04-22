@extends('layouts.admin.app')

@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="" name="userForm" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="customFile">Bild</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="file" id="customFile">
						<label class="custom-file-label" for="customFile">Datei auswählen</label>
					</div>
				</div>
				<div class="form-group">
					<label for="prename">Vorname</label>
					<input type="text" class="form-control" id="prename" name="prename">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="name">Zusatztext</label>
					<input type="text" class="form-control" id="additional" name="additional">
				</div>
				<div class="form-group">
					<label for="historyText">Instrument</label>
					<select class="custom-select" name="genre">
						@foreach($genres as $genre)
							<option value="{{ $genre->id }}">{{ $genre->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Speichern</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
