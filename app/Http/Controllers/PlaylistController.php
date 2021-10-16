<?php

namespace App\Http\Controllers;

use App\Repository\PlaylistRepository;
use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PlaylistController extends Controller
{
    private PlaylistRepository $playlistRepository;


    public function __construct(PlaylistRepository $playlistRepository)
    {
        $this->playlistRepository = $playlistRepository;
    }

    public function index(): View
    {
        if (Auth::check()) {
            return view('playlist.index', [
                'playlists' => $this->playlistRepository->all()
            ]);
        }
        return view('auth.login');
    }

    public function show(Request $request, int $id): View
    {
       $data = $this->playlistRepository->get($request, $id);
       if (Auth::check()) {
           return view('playlist.show', [
               'playlist' => $data['playlist'],
               'playlists' => $data['playlists'],
               'songs' => $data['songs'],
           ]);
       }
        return view('auth.login');
    }

    public function searchPlaylistsByPhrase(Request $request)
    {
        $data = $this->playlistRepository->search($request);
        return json_encode($data);
    }


    public function store(Request $request) :RedirectResponse
    {
       $this->playlistRepository->store($request);

        return redirect()->route('get.playlists');
    }


    public function destroy(int $id): RedirectResponse
    {
        $this->playlistRepository->delete($id);

        return redirect()->route('get.playlists')
            ->with('success', 'Playlistę usunięto pomyślnie.');
    }

    public function addSongToPlaylist(Request $request): RedirectResponse
    {
       $this->playlistRepository->addSong($request);
        return redirect()->back();
    }

    public function removeSongFromPlaylist(Request $request, int $playlistId): RedirectResponse
    {
        $this->playlistRepository->removeSong($request, $playlistId);

        return redirect()->back();
    }

}
