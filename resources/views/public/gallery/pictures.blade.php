@extends('layouts.public.app')

@section('title', 'Fotos')

@section('content')
	<div class="container content-container gallery-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Fotos</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			@foreach($albums as $album)
				<div class="col-12 col-md-4">
					<a href="/galerie/fotos/{{ $album->keyword }}">
						<div class="gallery-picture-container">
							<img src="<?=Image::url('/storage/'.$album->thumbImage,300,300,array('crop'))?>" />
							<h4 class="gallery-overview-title">{{ $album->title }}</h4>
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection