@extends('layouts.public.app')
@section('title', 'Presse')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Presse</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			@foreach($presse as $press)
				<div class="col-12 col-md-6 press">
					<a href="{{ Storage::url($press->link) }}" data-lightbox="press-{{ $press->id }}" data-title="">
						<img src="{{ Storage::url($press->link) }}" class="img-fluid" />
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection
