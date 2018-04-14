@extends('layouts.public.app')
@section('title', 'Geschichte')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">The Pig Farmers Big Band</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			<div class="d-none d-md-block col-12 col-md-3">
				<img src="/images/PigFarmers_Logo.png" class="img-fluid" />
			</div>
			<div class="col-12 col-md-9 history-row">
				@foreach($history as $hist)
				<div class="row">
					<div class="col-3">
						{{ $hist->title }}
					</div>
					<div class="col-9">
						{!! $hist->description !!}
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
