@extends('layouts.admin.app')
@section('title', 'Bandmitglieder')
@section('content')
<div class="container admin-container">
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<a href="{{ route('admin_member_create') }}">
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
							Vorname
						</th>
						<th>
							Name
						</th>
						<th>
							Instrument
						</th>
						<th>
						</th>
					</tr>
				</thead>
				<tbody>
            	@foreach($members as $member)
            		<tr>
	            		<td>{{ $member->prename }}</td>
	            		<td>{{ $member->name }}</td>
	            		<td>{{ $genres[$member->genre] }}</td>
	            		<td class="list-icon-container">
							<a class="list-icon" href="{{ route('admin_member_edit', $member->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a class="list-icon" href="{{ route('admin_member_delete', $member->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
            	@endforeach
            </div>
        </div>
    </div>
</div>

@endsection