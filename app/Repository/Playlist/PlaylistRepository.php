<?php


namespace App\Repository\Playlist;


use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PlaylistRepository implements \App\Repository\PlaylistRepository
{
    private Playlist $playlist;
    private Song $song;
    private PlaylistSong $playlistSong;


    public function __construct(Playlist $playlist, Song $song, PlaylistSong $playlistSong)
    {
        $this->playlist = $playlist;
        $this->song = $song;
        $this->playlistSong = $playlistSong;
    }

    public function all()
    {
        return $this->playlist->where('user_id', Auth::id())->get();
    }

    public function get(Request $request, int $id): array
    {
        $phrase = $request->get('phrase', '');
        $playlist = $this->playlist->with('playlistSongs')->find($id);
        $songs = [];
        foreach($playlist->playlistSongs as $playlistSong) {
            $songs[] = $this->song->where('title', 'like', "%$phrase%")->with('album','artist')
                ->find($playlistSong->song_id);
        }
        $songs = $this->filterArray($songs);
        $playlists = $this->playlist->where('user_id', Auth::id())->inRandomOrder()->get();;
        $playlistJson = json_encode($songs);
        file_put_contents('json/playlist.json', $playlistJson);

        return [
            'playlist'=> $playlist,
            'playlists' =>$playlists,
            'songs' => $songs];
    }

    public function search(Request $request)
    {
        $phrase = $request->post('phrase');
        return  $this->playlist->where('name', 'like', "%$phrase%")->get();
    }

    public function store(Request $request)
    {
        $name = $request->post('name');
        $playlist = new Playlist();
        $playlist->name = $name;
        $playlist->user_id = Auth::id();
        $playlist->save();
    }

    public function delete(int $id)
    {
        $this->playlist->find($id)->delete();
    }

    public function addSong(Request $request)
    {
        $songId = $request->post('songId');
        $playlistId = $request->post('playlistId');
        $song = $this->song->find($songId);
        $playlistSong = new PlaylistSong([
            'song_id' => $songId,
            'playlist_id' => $playlistId,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'title' => $song->title
        ]);

        $playlistSong->save();
    }

    public function removeSong(Request $request, int $playlistId)
    {
        $songId = $request->post('songId');
        $this->playlistSong->where([
            'song_id' => $songId,
            'playlist_id' => $playlistId
        ])
            ->delete();
    }

    private function filterArray(array $array): array
    {
        foreach ($array as $a) {
            if (($key = array_search(null, $array)) !== false) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
