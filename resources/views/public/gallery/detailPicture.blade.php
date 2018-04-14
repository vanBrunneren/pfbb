@extends('layouts.public.app')
@section('title', 'Album Name')
@section('content')
	<div class="container content-container gallery-detail-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">{{ $album->title }}</h1>
				<h6><a href="/galerie/fotos">Fotos</a> > {{ $album->title }}</h6>
				<hr class="content-line-no-top">
			</div>
		</div>
		<div class="row">
			@foreach($images as $image)
			<div class="col-12 col-md-4">
				<a href="{{ Storage::url($image->path) }}" data-lightbox="{{ $album->keyword }}" data-title="">
					<img src="<?=Image::url('/storage/'.$image->path,300,300,array('crop'))?>" class="img-fluid gallery-detail-image" />
				</a>
			</div>
			@endforeach
		</div>
	</div>
@endsection
