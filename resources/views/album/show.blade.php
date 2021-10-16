@extends('layouts.app')
@section('search')
    <form method="get" action="{{ route('get.album', ['id' => $album->id]) }}">
        <input type="text" class="searchInput" placeholder="Wpisz oraz zatwierdź..." name="phrase">
        <button class="fas fa-search" type="submit"></button>
    </form>
@endsection
@section('main')
    <script>let songId = null</script>
    <section class="albumDetails text-white-50">
        <div class="itemImage">
            <img src="{{ asset($album->photo) }}" class="album-image" alt="">
        </div>
        <div class="details ml-3">
            <h2 class="title">{{ $album->title }}</h2>
            <p class="author">{{ $album->artist->name }}</p>
            <p class="howManySongs">{{ $album->songs->count() }} piosenek</p>
        </div>
    </section>
    <a href="{{ route('get.albums') }}" class="d-block mt-5 backToAlbums">Wróć do listy albumów</a>
    <table class="table text-white-50 mt-5 table-borderless">
        <tbody>
        @foreach($songs as $song)
            <tr>
                <th scope="row"><span class="fas fa-play" index='{{ $loop->index }}'></span><span
                        class="index">{{ $loop->iteration }}</span></th>
                <td><span class="text-white">{{ $song->title }}</span><br>{{ $album->artist->name }}</td>
                <td><span class="fas fa-ellipsis-h" onclick="showOptionsMenu(this)">
                    <input type="hidden" value="{{ $song->id }}">
                </span></td>
                <td>{{ $song->duration }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <nav class="optionsMenu">
        <select class="select-menu" onchange="if (this.value) addSongToPlaylist(this.value)" >
            <option value="none" selected disabled hidden>Dodaj do Playlisty</option>
            @forelse($playlists as $single_playlist)
                <option
                    class="elem" value="{{$single_playlist->id}}">
                    {{ $single_playlist->name }}
                </option>
            @empty
                <option value="">Nie masz ani jednej Playlisty</option>
            @endforelse
        </select>
    </nav>
@endsection
@section('customjavascripts')
    <script src="{{ mix('js/album.js') }}">
    </script>
    <script>
        document.querySelector('.songInfo img').src = `{{ asset($album->photo) }}`
        document.querySelector('h6.title').textContent = `{{ $album->songs[0]->title }}`
        document.querySelector('h6.author').textContent = `{{ $album->artist->name }}`


        const showOptionsMenu = (button) => {
            const menu = document.querySelector('.optionsMenu')
            const rect = button.getBoundingClientRect()
            const topPosition = rect.top
            const leftPosition = rect.left - 1 / 10 * innerWidth
            menu.style.top = topPosition + "px"
            menu.style.left = leftPosition + "px"
            menu.style.display = "inline"

            songId = button.children[0].value
        }

        const addSongToPlaylist = (playlistId) => {
            document.body.innerHTML += `<form action={{ route('add.to.playlist') }} method='post' id='atpForm'>@csrf
            <input type='hidden' name='songId' value='${songId}'>
            <input type='hidden' name='playlistId' value='${playlistId}'></form>`
            document.getElementById('atpForm').submit()
        }
    </script>
@endsection
