@extends('layouts.admin.app')

@section('content')
<div class="container admin-container">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
                    Home<br>
                    <a href="{{ route('admin_home') }}">Home</a><br>
                    <hr>
                    Band<br>
                    <a href="{{ route('admin_history') }}">Geschichte</a>
                    <a href="{{ route('admin_members') }}">Mitglieder</a>
                    <a href="{{ route('admin_repertoire') }}">Repertoire</a>
                    <hr>
                    @endif
                    @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root') || Auth::user()->hasRole('calendar_admin'))
                    Events<br>
                    <a href="{{ route('admin_events') }}">Events</a>
                    <hr>
                    @endif
                    @if(Auth::user()->hasRole('editor') || Auth::user()->hasRole('root'))
                    Galerie<br>
                    <a href="{{ route('admin_gallery_images_albums') }}">Fotos</a>
                    <a href="{{ route('admin_videos') }}">Videos</a>
                    <a href="{{ route('admin_presse') }}">Presse</a>
                    <hr>
                    Links<br>
                    <a href="{{ route('admin_links') }}">Links</a>
                    <hr>
                    @endif
                    Absenzen<br>
                    <a href="{{ route('admin_absences') }}">Absenz erfassen</a>
                    <a href="{{ route('admin_absences_show') }}">Absenz Liste anzeigen</a>
                    <a href="{{ route('admin_user') }}">Mitgliederliste anzeigen</a>
                    <a href="/admin/changepassword">Passwort ändern</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
