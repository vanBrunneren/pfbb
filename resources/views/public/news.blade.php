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
					<img src="{{ Storage::url($news->img) }}" class="img-fluid" />
				</div>
				<div class="col-6">
					<p>{{ $news->date }}</p>
					<p>
						{{ $news->text }}
					</p>
				</div>
			</div>
		@endforeach
	</div>
@endsection
