@extends('layouts.admin.app')
@section('title', 'Aktueller Eintrag bearbeiten')
@section('content')
<div class="container admin-container">
    <div class="row">
		<div class="col-12">
			<form method="POST" action="" name="fileUpload" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="file" id="customFile">
					<label class="custom-file-label" for="customFile">Datei auswählen</label>
					<br><br>
				</div>
				<div class="form-group">
					<label for="name">Text</label>
					<textarea class="form-control" id="text" rows="6" name="text">{{ $news->text }}</textarea>
				</div>
				<button type="submit" class="btn btn-primary">Speichern</button>
			</form>
		</div>
    </div>
</div>
@endsection
