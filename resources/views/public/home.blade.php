@extends('layouts.public.app')
@section('title', 'Home')
@section('content')
<div class="container home-content">
    <div class="row">
        <div class="d-none d-md-block col-12 home-title-container">
            <h4 class="home-title">Herzlich Willkommen auf unserer Webseite</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-3 next-events">
            <h3 class="home-subtitle">Nächste Events</h3>
            @foreach($events as $event)
                {{ date('d.m.Y', strtotime($event->date)) . ' - ' . $event->name . ' ' . $event->location }}
                @if($event->name == 'onStage')
                    <a href="/vorverkauf">
                        <button type="button" class="btn btn-secondary btn-sm">Zum Vorverkauf</button>
                    </a>
                @endif
                <hr>
            @endforeach
            <div class="button-container">
                <a href="/events">
                    <button type="button" class="btn btn-primary">Alle Events</button>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-9 no-padding">
            <img src="/images/Home_Image.jpg" class="img-fluid" />
        </div>
    </div>
</div>
@endsection