<?php

namespace App\Http\Controllers;

use App\Repository\AlbumRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{

    private AlbumRepository $albumRepository;


    public function __construct(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function index(): View
    {
        $this->albumRepository->getSongsJson();

        if (Auth::check()) {
            return view('album.index', [
                'albums' => $this->albumRepository->all()
                ]);
        }
        return view('auth.login');

    }

    public function searchAlbumsByPhrase(Request $request)
    {
        $data = $this->albumRepository->search($request);
        return json_encode($data);
    }

    public function show(Request $request, int $id): View
    {
       $data = $this->albumRepository->get($request, $id);
       if (Auth::check()) {
           return view('album.show', [
               'album' => $data['album'],
               'playlists' => $data['playlists'],
               'songs' => $data['songs'],
           ]);
       }
       return view('auth.login');
    }


}
