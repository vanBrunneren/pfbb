@extends('layouts.admin.app')
@section('title', 'Event erstellen')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<form method="POST" action="" name="eventsForm">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Anlass</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $event->name ? $event->name : '' }}">
					</div>
					<div class="form-group">
						<label for="location">Ort</label>
						<input type="text" class="form-control" id="location" name="location" value="{{ $event->location ? $event->location : '' }}">
					</div>
					<div class="form-group">
						<label for="datetime">Datum / Uhrzeit</label>
						<input type="text" class="form-control datepicker" id="datetime" name="datetime" value="{{ $event->datetime ? $event->datetime : '' }}">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="public" id="public" {{ $event->isExtern ? 'selected' : '' }}>
							<label class="form-check-label" for="public">
								Öffentlich
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Speichern</button>
				</form>
			</div>
		</div>
	</div>
@endsection