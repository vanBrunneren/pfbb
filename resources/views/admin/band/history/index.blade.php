@extends('layouts.admin.app')

@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<a href="{{ route('admin_history_create') }}">
					<button type="button" class="btn btn-success">Neuer Eintrag</button>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<th>
							
						</th>
						<th>
							Titel
						</th>
						<th>
							Text
						</th>
						<th>
						</th>
					</tr>
				</thead>
				<tbody>
				@foreach($historys as $history)

					<tr>
						<td>#</td>
						<td>{{ $history->title }}</td>
						<td>{!! $history->description !!}</td>
						<td class="list-icon-container">
							<a class="list-icon" href="{{ route('admin_history_edit', $history->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a class="list-icon" href="{{ route('admin_history_delete', $history->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>

				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection