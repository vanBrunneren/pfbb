@extends('layouts.public.app')
@section('title', 'Aktuelles')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Aktuelles</h1>
				<hr class="content-line">
			</div>
		</div>
		@foreach($news as $n)
			<div class="row">
				<div class="col-6">
					<img src="{{ Storage::url($n->img) }}" class="img-fluid" />
				</div>
				<div class="col-6">
					<p>{{ $n->date }}</p>
					<p>
						{{ $n->text }}
					</p>
				</div>
			</div>
			<hr style="margin-top: 40px; margin-bottom: 40px;">
		@endforeach
	</div>
@endsection
