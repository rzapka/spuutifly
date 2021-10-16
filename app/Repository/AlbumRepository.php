<?php


namespace App\Repository;


use Illuminate\Http\Request;

interface AlbumRepository
{
    public function getSongsJson();
    public function all();
    public function get(Request $request, int $id): array;
    public function search(Request $request);

}
