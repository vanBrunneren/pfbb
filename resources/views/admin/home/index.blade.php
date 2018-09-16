@extends('layouts.admin.app')
@section('title', 'Home')
@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="" name="userForm" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Aktuelles</label>
					<textarea class="form-control" id="aktuelles" rows="6" name="aktuelles">{{ $home->actual ? $home->actual : '' }}</textarea>
				</div>
                <div class="form-group">
					<label for="customFile">Bild ersetzen</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" name="file" id="customFile">
						<label class="custom-file-label" for="customFile">Datei auswählen</label>
					</div>
				</div>
                <div class="form-group">
					<button type="submit" class="btn btn-primary">Speichern</button>
				</div>
            </form>
        </div>
    </div>
</div>
@endsection
