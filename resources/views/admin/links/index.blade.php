@extends('layouts.admin.app')
@section('title', 'Links')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<div class="form-group">
					<a href="{{ route('admin_links_create') }}">
						<button type="button" class="btn btn-success">Neuer Eintrag</button>
					</a>
				</div>
			</div>
			<div class="col-12">
				<table class="table">
					<thead>
						<tr>
							<th>
								Titel
							</th>
							<th>
								Link
							</th>
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
					@foreach($links as $link)
						<tr>
							<td>{{ $link->title }}</td>
							<td>{{ $link->link }}</td>
							<td class="list-icon-container">
								<a class="list-icon" href="{{ route('admin_links_edit', $link->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								<a class="list-icon" href="{{ route('admin_links_delete', $link->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
