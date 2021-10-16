@extends('layouts.app')
@section('search')
    <input type="text" class="searchInput" placeholder="Szukaj..." name="phrase">
    <i class="fas fa-search"></i>
@endsection
@section('main')
    <h2 class="text-white font-weight-bold text-uppercase font-italic mb-4">Twoje Playlisty</h2>
    <button class="btn-lg mx-auto d-block btn btn-success add-playlist font-weight-bold"
            onclick="createPlaylist()">
        Nowa Playlista
    </button>
    @if (session()->has('success'))
        <div class="alert alert-success mx-auto mt-4 alert-dismissible w-25 fade show" role="alert" >
            <strong>Playlistę usunięto pomyślnie.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="items row mt-5">
        @forelse($playlists as $playlist)
            <div class="item col-1 mt-3 playlist">
                <a href="{{ route('get.playlist', ['id' => $playlist->id]) }}" class="playlist-link"><img src="{{ asset('storage/images/playlist.png') }}" alt=""
                    class="playlist-image"></a>
                <p class="playlistName">{{ $playlist->name }}</p>
            </div>
         @empty
            <h4 class="mt ml-5">Nie masz jeszcze ani jednej playlisty.</h4>
        @endforelse
    </div>
@endsection
@section('customjavascripts')
    <script src="{{ mix('js/albums.js') }}"></script>
    <script>
        const createPlaylist = () => {
            const alert = prompt('Proszę wpisać nazwę nowej Playlisty')
            if (alert !== null) {
                document.querySelector('.mainContent').innerHTML+=
                    `<form id='dynForm' action="{{ route('playlists.store' )}}"
                     method='post'>@csrf<input type='hidden' value=${alert} name='name'>
                    </form>`
                document.getElementById('dynForm').submit()
            }
        }
    </script>
    <script src="{{ mix('js/searchPlaylists.js') }}"></script>
@endsection
