@extends('layouts.app')
@section('search')
    <form method="get" action="{{ route('get.playlist', ['id' => $playlist->id]) }}">
        <input type="text" class="searchInput" placeholder="Wpisz oraz zatwierdź..." name="phrase">
        <button class="fas fa-search" type="submit"></button>
    </form>
@endsection
@section('main')
    <script>
        let songId = null
    </script>
    <section class="playlistDetails text-white-50">
        <div class="itemImage">
            <img src="{{ asset('storage/images/playlist.png') }}" alt="">
        </div>
        <div class="details ml-4 text-white">
            <h1 class="title">{{ $playlist->name }}</h1>
            <h4 class="my-5 howManySongs">{{ $playlist->playlistSongs->count() }} piosenek</h4>
            <a class="backToPlaylists" href="{{ route('get.playlists') }}">Wróć do listy playlist</a>
        </div>
    </section>
    <form
        action="{{ route('playlist.destroy', ['id' => $playlist->id]) }}"
        method="post">
        @method('DELETE')
        @csrf
        <button type="submit" onclick="return confirm('Czy na pewno?')" class="delPlaylistBtn">
            Usuń playlistę
        </button>
    </form>
    <table class="table text-white-50 mt-5 table-borderless">
        <tbody>
        @forelse($songs as $song)

            <tr>
                <th scope="row"><span class="fas fa-play" index='{{ $loop->index }}'></span><span
                        class="index">{{ $loop->iteration }}</span></th>
                <td><span class="text-white">{{ $song->title }}</span><br>{{ $song->album->artist->name }}</td>
                <td><span class="fas fa-ellipsis-h" onclick="showOptionsMenu(this)">
                        <input type="hidden" class="hidden" value="{{ $song->id }}">
                    </span></td>
                <td>{{ $song->duration }}</td>
            </tr>

        @empty
            <h3 class="mt-5 noPlaylist">Nie masz jeszcze piosenek na tej playliście.</h3>
        @endforelse
        </tbody>
    </table>

    <nav class="optionsMenu">
        <select class="select-menu" onchange="if (this.value == -1) {removeSongFromPlaylist()}
        else if (this.value) {addSongToPlaylist(this.value)}">
            <option value="none" selected disabled hidden>Wybierz opcję</option>
            <option value=-1 onclick="removeSongFromPlaylist()">Usuń z tej playlisty</option>
            @forelse($playlists as $single_playlist)
                @if($playlist->id === $single_playlist->id)
                    @continue
                @endif
                <option class="elem" value="{{ $single_playlist->id }}">
                    Dodaj do playlisty {{ $single_playlist->name }}
                </option>
            @empty
                <option value="">Nie masz ani jednej playlisty</option>
            @endforelse
        </select>
    </nav>
@endsection
@section('customjavascripts')
    <script id="js" src="{{ mix('js/playlist.js') }}"></script>
    <script>
        const showOptionsMenu = (button) => {
            const menu = document.querySelector('.optionsMenu')
            const rect = button.getBoundingClientRect()
            const topPosition = rect.top
            const leftPosition = rect.left - 1 / 10 * innerWidth
            menu.style.top = topPosition + "px"
            menu.style.left = leftPosition + "px"
            menu.style.display = "inline"
            songId = button.children[0].value
            console.log(songId)
        }

        const addSongToPlaylist = (playlistId) => {
            document.body.innerHTML += `<form action={{ route('add.to.playlist') }} method='post' id='aForm'>@csrf
            <input type='hidden' name='songId' value='${songId}'>
            <input type='hidden' name='playlistId' value='${playlistId}'></form>`
            document.getElementById('aForm').submit()
        }

        const removeSongFromPlaylist = () => {
            document.body.innerHTML += `<form action={{ route('remove.from.playlist', ['id' => $playlist->id]) }}
            method='post' id='rForm'>@csrf @method('delete')
            <input type='hidden' name='songId' value='${songId}'>
            </form>`
            document.getElementById('rForm').submit()
        }
    </script>
@endsection
