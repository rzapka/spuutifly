<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albumsTable = DB::table('albums');
        $id = 1;
        foreach($this->albumsData() as [$title, $id, $photo]) {
            $albumsTable->insert([
                'id' => $id,
                'title' => $title,
                'artist_id' => $id,
                'genre_id' => $id,
                'photo' => "storage/images/artwork/$photo"
            ]);
            $id++;
        }
    }

    private function albumsData() : array
    {
        return [
            ['Pizza Head', 1, 'clearday.jpg'],
            ['Hello World', 2, 'energy.jpg'],
            ['Bacon with Eggs', 3, 'funkyelement.jpg'],
            ['Dark Spaghetti', 4, 'goinghigher.jpg'],
            ['Green Coffee', 5, 'popdance.jpg'],
            ['Honor and Homeland', 6, 'sweet.jpg'],
            ['The movie soundtrack', 7, 'ukulele.jpg']
        ];
    }
}
