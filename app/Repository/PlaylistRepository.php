<?php


namespace App\Repository;


use Illuminate\Http\Request;

interface PlaylistRepository
{
    public function all();
    public function get(Request $request, int $id): array;
    public function search(Request $request);
    public function store(Request $request);
    public function delete(int $id);
    public function addSong(Request $request);
    public function removeSong(Request $request, int $playlistId);
}
