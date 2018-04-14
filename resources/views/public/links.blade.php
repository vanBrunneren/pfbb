@extends('layouts.public.app')
@section('title', 'Links')
@section('content')
	<div class="container content-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Links</h1>
				<hr class="content-line">
			</div>
		</div>
		<div class="row">
			@foreach($links as $link)
				<div class="col-6">
					<h2>{{ $link->title }}</h2>
				</div>
				<div class="col-6">
					<a href="https://{{ $link->link }}">{{ $link->link }}</a>
				</div>
			@endforeach
		</div>
	</div>
@endsection