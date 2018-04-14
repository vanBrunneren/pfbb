@extends('layouts.admin.app')
@section('title', 'Mitglieder')
@section('content')
<div class="container admin-container">
	@if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<a href="{{ route('admin_user_create') }}">
					<button type="button" class="btn btn-success">Neuer Eintrag</button>
				</a>
			</div>
		</div>
	</div>
	@endif
	<div class="row">
		<div class="col-12">
			<table class="table">
				<thead>
					<tr>
						<th>Vorname</th>
						<th>Name</th>
						<th>Strasse</th>
						<th>Nr.</th>
						<th>PLZ</th>
						<th>Ort</th>
						<th>Mobile</th>
						<th>Email</th>
						@if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
							<th></th>
						@endif
					</tr>
				</thead>
				<tbody>				
					@foreach($users as $user)
						<tr>
							<td>{{ $user->prename }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->street_name }}</td>
							<td>{{ $user->street_number }}</td>
							<td>{{ $user->plz }}</td>
							<td>{{ $user->city }}</td>
							<td>{{ $user->mobile }}</td>
							<td>{{ $user->email }}</td>
							@if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
								<td class="list-icon-container">
									<a class="list-icon" href="{{ route('admin_user_edit', $user->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="list-icon" href="{{ route('admin_user_delete', $user->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

{{--
@foreach($roles as $role)
<th>
<span title="Gast">{{ $role->name }}</span>
</th>
@endforeach
@foreach($roles as $role)
<td>
<div class="form-check">
<input class="form-check-input role_checkbox" type="checkbox" value="{!! $user->id !!}" name="{!! $role->name !!}" {{ $user->roles()->where('role_id', $role->id)->first() ? 'checked' : '' }}>
</div>
</td>
@endforeach
*/
--}}