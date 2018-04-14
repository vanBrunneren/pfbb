@extends('layouts.admin.app')
@section('title', 'Absenzen anzeigen')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<td>Anlass</td>
							<td>Ort</td>
							<td>Zeit</td>
							<td>Datum</td>
						</tr>
					</thead>
					<tbody>
					@foreach($all_events as $event)
						<tr>
							<td class="absences-row"><p>{{ $event['event']->name }}</p></td>
							<td class="absences-row"><p>{{ $event['event']->location }}</p></td>
							<td class="absences-row"><p>{{ date('H:i', strtotime($event['event']->date)) }}</p></td>
							<td class="absences-row"><p>{{ date('d.m.Y', strtotime($event['event']->date)) }}</p></td>
						</tr>
						@if(count($event['absences']) > 0)
							<tr>
								<td colspan="4">
									<table class="table-bordered">
										<tr>
											<td>Name</td>
											<td>Grund</td>
										</tr>
										@foreach($event['absences'] as $absence)
											<tr>
												<td>{{ $absence->prename . ' ' . $absence->name }}</td>
												<td>{{ $absence->reason }}</td>
											</tr>
										@endforeach
									</table>
								</td>
							</tr>
						@endif
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection