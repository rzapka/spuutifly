<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artistsTable = DB::table('artists');
        $id = 1;
        foreach($this->artistsData() as $name) {
            $artistsTable->insert([
                    'id' => $id,
                    'name' => $name
                ]);
                $id++;
        }
    }

    private function artistsData(): array
    {
        return [
            'Chuck Norris', 'Mickey Mouse', 'Mario Bros', 'Shrek', 'Bilbo Baggins', 'Sir Lancelot', 'Gandalf'
        ];
    }
}
