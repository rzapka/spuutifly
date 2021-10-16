<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtistsSeeder::class);
        $this->call(GenresSeeder::class);
        $this->call(AlbumsSeeder::class);
        $this->call(SongsSeeder::class);
    }
}
