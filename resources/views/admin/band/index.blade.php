@extends('layouts.admin.app')
@section('title', 'Band')
@section('content')
	<div class="container admin-container">
		<div class="row">
			<div class="col-12">
				<a href="{{ route('admin_history') }}">Geschichte</a><br>
				<a href="{{ route('admin_members') }}">Mitglieder</a><br>
				<a href="{{ route('admin_repertoire') }}">Repertoire</a><br>
			</div>
		</div>
	</div>
@endsection