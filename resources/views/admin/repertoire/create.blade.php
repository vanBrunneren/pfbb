@extends('layouts.admin.app')
@section('title', 'Repertoire')
@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="" name="userForm">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="inputTitle">Titel</label>
					<input type="text" class="form-control" id="inputTitle" name="title">
				</div>
                <div class="form-group">
					<label for="historyText">Text</label>
					<textarea class="form-control ckeditor" name="text" id="text" rows="8"></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Speichern</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
