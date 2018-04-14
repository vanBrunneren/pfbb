@extends('layouts.admin.app')
@section('title', 'Bilder hochladen')
@section('content')
<div class="container admin-container">
    <div class="row">
		<div class="col-12">
			<form method="POST" action="" name="fileUpload" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="custom-file">
					<input type="file" class="custom-file-input" name="files[]" id="customFile" multiple>
					<label class="custom-file-label" for="customFile">Dateien auswählen</label>
				</div><br><br>
				<button type="submit" class="btn btn-primary">Speichern</button>
			</form>	
		</div>
    </div>
</div>
@endsection
