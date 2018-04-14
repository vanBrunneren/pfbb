@extends('layouts.admin.app')

@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="" name="userForm">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="prenameInput">Titel</label>
					<input type="text" class="form-control" id="prenameInput" name="title">
				</div>
				<div class="form-group">
					<label for="historyText">Beschreibung</label>
					<textarea class="form-control ckeditor" name="description" id="historyText" rows="8"></textarea>
				</div>
				<div class="form-group">
					<select name="entry_status" class="form-control">
					  	<option value="public" selected>public</option>
					  	<option value="hidden">hidden</option>
					  	<option value="deleted">deleted</option>
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