@extends('layouts.admin.app')
@section('title', 'Events')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<form class="form-inline" method="POST" action="{{ route('admin_events_multisave') }}">
					{{ csrf_field() }}
					<a href="{{ route('admin_events_create') }}"><button type="button" class="form-control mb-2 mr-sm-2 btn btn-success">Neuer Eintrag</button></a>
					<p class="inline-form-text">Proben eintragen bis:</p>
					<input type="text" name="multisave_date" class="datepicker form-control mb-2 mr-sm-2" />
					<button type="submit" class="form-control mb-2 mr-sm-2 btn btn-success">Speichern</button>
				</form>
		    </div>
		</div>
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<td>Anlass</td>
							<td>Ort</td>
							<td>Datum</td>
							<td>Zeit</td>
							<td>Öffentlich</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($events as $event)
							<tr>
								<td>{{ $event->name }}</td>
								<td>{{ $event->location }}</td>
								<td>{{ date('d.m.Y', strtotime($event->date)) }}</td>
								<td>{{ date('H:i', strtotime($event->date)) }}</td>
								<td>
									@if($event->isExtern)
										<i class="fa fa-check-square-o" aria-hidden="true"></i> 
									@else
										<i class="fa fa-square-o" aria-hidden="true"></i> 
									@endif
								</td>
								<td class="list-icon-container">
									<a class="list-icon" href="{{ route('admin_events_edit', $event->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="list-icon" href="{{ route('admin_events_delete', $event->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection