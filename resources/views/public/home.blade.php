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
            <div>
                <h3 class="home-subtitle">Aktuelles</h3>
                <p>
                    {{ $home->actual }}
                    <p style="margin-top: 10px">
                        Detailinformationen finden Sie unter der Rubrik <a href="/aktuelles" style="text-decoration: none; color: #000000">«Aktuelles»</a>
                    </p>
                </p>
            </div>
            <div>
                <h3 class="home-subtitle">Nächste Events</h3>
                @foreach($events as $event)
                    {{ date('d.m.Y', strtotime($event->date)) . ' - ' . $event->name . ' ' . $event->location }}
                    @if($event->id == 21)
                        <p style="color: red; padding: 0px; margin: 0px;">Ausverkauft!<br>
                        Weitere Auskünfte unter:<br>
                        062 836 40 50
                        </p>
                    @endif
                <?php
                /*
                    @if($event->id == 21)
                        <a href="/vorverkauf">
                            <button type="button" class="btn btn-secondary btn-sm">Zum Vorverkauf</button>
                        </a>
                    @endif
                */
                ?>
                    <hr>
                @endforeach
            </div>
            <div class="button-container" style="padding-bottom: 40px">
                <a href="/events">
                    <button type="button" class="btn btn-primary">Alle Events</button>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-9 ">
            <img class="img-fluid" src="{{ Storage::url($home->image) }}" />
        </div>
    </div>
</div>
@endsection
