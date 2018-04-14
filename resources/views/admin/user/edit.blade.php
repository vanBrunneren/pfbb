@extends('layouts.admin.app')

@section('title', $user->prename . ' ' . $user->name . ' bearbeiten')

@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<form method="POST" action="" name="userForm">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="prenameInput">Vorname</label>
						<input type="text" class="form-control" id="prenameInput" name="prename" value="{{ $user->prename }}">
					</div>
					<div class="form-group">
						<label for="nameInput">Name</label>
						<input type="text" class="form-control" id="nameInput" name="name" value="{{ $user->name }}">
					</div>
					<div class="form-group">
						<label for="streetInput">Strasse</label>
						<input type="text" class="form-control" id="treetInput" name="street_name" value="{{ $user->street_name }}"">
					</div>
					<div class="form-group">
						<label for="streetNrInput">Hausnummer</label>
						<input type="text" class="form-control" id="streetNrInput" name="street_number" value="{{ $user->street_number }}"">
					</div>
					<div class="form-group">
						<label for="plzInput">PLZ</label>
						<input type="number" class="form-control" id="plzInput" name="plz" value="{{ $user->plz }}"">
					</div>
					<div class="form-group">
						<label for="cityInput">Ort</label>
						<input type="text" class="form-control" id="cityInput" name="city" value="{{ $user->city }}"">
					</div>
					<div class="form-group">
						<label for="mobileInput">Mobile</label>
						<input type="text" class="form-control" id="mobileInput" name="mobile" value="{{ $user->mobile }}"">
					</div>
					<div class="form-group">
						<label for="emailInput">E-Mail</label>
						<input type="email" class="form-control" id="emailInput" name="email" value="{{ $user->email }}"">
					</div>
					<div class="form-group">
						<label for="password">Passwort</label>
						<input type="password" class="form-control" id="password" name="password" value="">
					</div>
					<div class="form-group">
						<label>Rechte</label>
						@foreach($roles as $role)
							<div class="checkbox">
					    		<label>
					        		<input name="roles[]" value="{!! $role->id !!}" type="checkbox" {{ $user->hasRole($role->name) ? 'checked' : '' }}> {{ $role->description }}
					      		</label>
					    	</div>
						@endforeach
					</div>
					<button type="submit" class="btn btn-primary">Speichern</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
			</div>
		</div>
	</div>
@endsection