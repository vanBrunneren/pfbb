@extends('layouts.public.app')

@section('title', 'Videos')

@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Videos</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			@foreach($videos as $video)
			<div class="col-12 col-md-6">
				<div class="gallery-picture-video-container">
					<div class="embed-responsive embed-responsive-16by9">
						{!! $video->link !!}
					</div>
					<h4 class="gallery-overview-title">{{ $video->title }}</h4>
				</div>
			</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-12">
				<div class="gallery-picture-video-container">
					<h4 class="gallery-overview-title">
						<a class="fb-link" target="_blank" href="https://www.facebook.com/thepigfarmersbigband">Weitere Videos findest du auf unserer Facebook Seite!</a>
					</h4>
				</div>
			</div>
		</div>
	</div>
@endsection
