<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Spuutifly') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/5e284c1b96.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('storage/favicon.svg') }}" type="image/x-icon"/>
</head>
<body>
@yield('content')
@if (Auth::check())
<div class="userPanel">
    <div class="search">
        @yield('search')
    </div>
    <ul class="mt-3 text-uppercase font-weight-bold mt-4">
        <li><a href="{{route('get.albums')}}">Albumy</a></li>
        <li><a href="{{route('get.playlists')}}">Playlisty</a></li>
        <li><a href="{{route('get.profile')}}">Twój Profil</a></li>
    </ul>
</div>
<main class="mainContent">
    @yield('main')
</main>
@include('playingBar')
@yield('customjavascripts')
</body>
@endif
</html>
