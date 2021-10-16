<?php


namespace App\Repository\Album;


use App\Models\Song;
use App\Models\Album;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumRepository implements \App\Repository\AlbumRepository
{
    private Album $album;
    private Song $song;
    private Playlist $playlist;

    public function __construct(Album $album, Song $song, Playlist $playlist)
    {
        $this->album = $album;
        $this->song = $song;
        $this->playlist = $playlist;
    }

    public function getSongsJson()
    {
        $songs = $this->song->with('album', 'artist')->inRandomOrder()->get();

        $songsJson = json_encode($songs);
        file_put_contents('json/randSong.json', $songsJson);
    }

    public function all()
    {
        return $this->album->all();
    }

    public function get(Request $request, int $id): array
    {
        $phrase = $request->get('phrase', '');
        $playlists = $this->playlist->where('user_id', Auth::id())->get();
        $album = $this->album->with('artist','songs')->find($id);
        $songs = $this->song->where('album_id', $id)->where('title', 'like', "%$phrase%")
            ->with('album','artist')->get();
        $albumJson = json_encode($songs);
        file_put_contents('json/album.json', $albumJson);

        return [
            'album' => $album,
            'playlists' => $playlists,
             'songs' => $songs
        ];
    }

    public function search(Request $request)
    {
        $phrase = $request->post('phrase');
        return $this->album->where('title', 'like', "%$phrase%")->get();
    }


}
