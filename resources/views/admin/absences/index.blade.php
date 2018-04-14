@extends('layouts.admin.app')
@section('title', 'Absenzen erfassen')
@section('content')
	<div class="container admin-container">
		<form method="POST" action="" name="absencesForm">
			<div class="row">
				<div class="col-12">
					<table class="table">
						<thead>
							<tr>
								<td>Anlass</td>
								<td>Ort</td>
								<td>Zeit</td>
								<td>Datum</td>
								<td>Abmeldung</td>
							</tr>
						</thead>
						<tbody>
							{{ csrf_field() }}
							@foreach($all_events as $event)
								<tr>
									<td class="absences-row"><p>{{ $event['event']->name }}</p></td>
									<td class="absences-row"><p>{{ $event['event']->location }}</p></td>
									<td class="absences-row"><p>{{ date('H:i', strtotime($event['event']->date)) }}</p></td>
									<td class="absences-row"><p>{{ date('d.m.Y', strtotime($event['event']->date)) }}</p></td>
									<td>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<div class="input-group-text">
													<input type="hidden" name="id[]" value="{{ $event['event']->id }}" />
													<input type="hidden" name="absence_{{ $event['event']->id }}" value="0" />
													<input type="checkbox" name="absence_{{ $event['event']->id }}" value="1" 
													@if(isset($event['absence']))
														checked="checked"
													@endif
													 />
												</div>
											</div>
											<input type="text" class="form-control" name="reason_{{ $event['event']->id }}" value="{!! isset($event['absence']) ? $event['absence']->reason : '' !!}" />
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Speichern</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection