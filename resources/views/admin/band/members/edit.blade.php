@extends('layouts.admin.app')

@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<form method="POST" action="" name="userForm">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="prename">Vorname</label>
					<input type="text" class="form-control" id="prename" name="prename" value="{{ $member->prename }}">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}">
				</div>
				<div class="form-group">
					<label for="historyText">Instrument</label>
					<select class="custom-select" name="genre">
						@foreach($genres as $genre)
							@if($genre->id == $member->genre)
								<option selected value="{{ $genre->id }}">{{ $genre->name }}</option>
							@else
								<option value="{{ $genre->id }}">{{ $genre->name }}</option>
							@endif
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