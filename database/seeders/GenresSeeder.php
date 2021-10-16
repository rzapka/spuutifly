<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genresTable = DB::table('genres');
        $id = 1;
        foreach($this->genresData() as $name) {
            $genresTable->insert([
                    'id' => $id,
                    'name' => $name
                ]);
                $id++;
        }
    }

    private function genresData(): array
    {
        return [
            'Rock', 'Pop', 'House', 'Opera', 'R&B', 'Hip-Hop', 'Soundtrack'
        ];
    }
}
