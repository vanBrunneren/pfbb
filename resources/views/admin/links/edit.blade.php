@extends('layouts.admin.app')
@section('title', 'Links')
@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="" name="userForm">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="inputTitle">Titel</label>
					<input type="text" class="form-control" id="inputTitle" name="title" value="{{ $link->title }}">
				</div>
				<div class="form-group">
					<label for="inputLink">Link</label>
					<input type="text" class="form-control" id="inputLink" name="link" value="{{ $link->link }}">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Speichern</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection