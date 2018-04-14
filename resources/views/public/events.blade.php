@extends('layouts.public.app')
@section('title', 'Events ' . $year )
@section('content')
	<div class="container content-container flex-fill">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Events {{ $year > 2016 ? $year : 'bis ' . $year }}</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Ort</th>
								<th>Datum</th>
								<th>Zeit</th>
							</tr>
						</thead>
						<tbody>
							@foreach($events as $event)
								<tr>
									<td>{{ $event->name }}</td>
									<td>{{ $event->location }}</td>
									<td>{{ date("d.m.Y", strtotime($event->date)) }}</td>
									<td>
										@if(date("H:i", strtotime($event->date)) != "00:00")
											{{ date("H:i", strtotime($event->date)) }}
										@else
											-
										@endif
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
