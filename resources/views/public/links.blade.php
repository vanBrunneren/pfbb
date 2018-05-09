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
		@foreach($links as $link)
			<div class="row" style="padding-bottom: 20px;">
				<div class="col-6">
					<h2 class="link-content">{{ $link->title }}</h2>
				</div>
				<div class="col-6">
					<a href="https://{{ $link->link }}">{{ $link->link }}</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection
