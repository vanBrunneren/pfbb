@extends('layouts.public.app')
@section('title', 'Repertoire')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Auszug aus dem Repertoire</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			@foreach($repertoire as $rep)
				<div class="col-12 col-md-6">
					<h2>{{ $rep->title }}:</h2>
					{!! $rep->text !!}
				</div>
			@endforeach
		</div>
	</div>
@endsection
