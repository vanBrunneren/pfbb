@extends('layouts.public.app')
@section('title', 'Mitglieder')
@section('content')
	<div class="container content-container members-container">
		<div class="row">
			<div class="col-12">
				<h1 class="content-title">Die Band</h1>
				<hr class="content-line">
			</div>
		</div>
		<?php
			$lastgenre = null;
			$output = null;
			$lastoutput = null;
		?>
		@foreach($members as $member)
			<div class="row">
				<div class="col-2">
					{{-- <img class="img-fluid person-image" src="{{ Storage::url($member->image) }}" /> --}}
					<img class="img-fluid person-image" src="/images/person_placeholder.jpeg" />
				</div>
				<div class="col-3">
					<p class="member-output">{{ $member->prename . " " . $member->name}}</p>
					<p class="member-description">
						Die PFBB ...
					</p>
				</div>
				<div class="col-3">
					@if($member->parent)
						<?php $output = $genres[$member->parent]; ?>
					@else
						<?php $output = $member->genre_name ?>
					@endif

					@if($output != $lastoutput)
						<p class="member-output">{{ $output }}</p>
					@endif
				</div>
				<div class="col-4">
					@if($member->parent)
						@if($lastgenre != $member->genre_name)
							<p class="member-output">{{ $member->genre_name }}</p>
						@endif
						<?php $lastgenre = $member->genre_name; ?>
					@endif
				</div>

			</div>

			<?php $lastoutput = $output; ?>
		@endforeach
@endsection
