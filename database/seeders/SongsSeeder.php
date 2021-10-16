<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songsTable = DB::table('songs');
        $id = 1;
        foreach($this->songsData() as [$title, $artist_id, $album_id, $genre_id, $duration,$file_name]) {
            $songsTable->insert([
                'id' => $id,
                'title' => $title,
                'artist_id' => $artist_id,
                'album_id' => $album_id,
                'genre_id' => $genre_id,
                'duration' => $duration,
                'file_name' => "/storage/music/$file_name"
            ]);
            $id++;
        }

    }

    private function songsData(): array
    {
        return [
            ['Memories', 1, 1, 1, '3:50', 'bensound-memories.mp3'],
            ['Little Idea', 1, 1, 1, '2:49', 'bensound-littleidea.mp3'],
            ['Jazzy Frenchy', 1, 1, 1, '1:44', 'bensound-jazzyfrenchy.mp3'],
            ['Happy Rock', 1, 1, 1, '1:45', 'bensound-happyrock.mp3'],
            ['Happiness', 1, 1, 1, '1:45', 'bensound-happiness.mp3'],
            ['Retro Soul', 2, 2, 2, '3:36', 'bensound-retrosoul.mp3'],
            ['Pop Dance', 2, 2, 2, '2:42', 'bensound-popdance.mp3'],
            ['Of Elias Dream', 2, 2, 2, '4:58', 'bensound-ofeliasdream.mp3'],
            ['November', 2, 2, 2, '3:32', 'bensound-november.mp3'],
            ['Moose', 2, 2, 2, '2:43', 'bensound-moose.mp3'],
            ['Going Higher', 3, 3, 3, '4:04', 'bensound-goinghigher.mp3'],
            ['Funky Element', 3, 3, 3, '3:08', 'bensound-funkyelement.mp3'],
            ['Extreme Action', 3, 3, 3, '8:03', 'bensound-extremeaction.mp3'],
            ['Energy', 3, 3, 3, '2:59', 'bensound-energy.mp3'],
            ['Dubstep', 3, 3, 3, '2:03', 'bensound-dubstep.mp3'],
            ['Sad Day', 4, 4, 4, '2:28', 'bensound-sadday.mp3'],
            ['Sci-fi', 4, 4, 4, '4:44', 'bensound-scifi.mp3'],
            ['Slow Motion', 4, 4, 4, '3:26', 'bensound-slowmotion.mp3'],
            ['Sunny', 4, 4, 4, '2:20', 'bensound-sunny.mp3'],
            ['Sweet', 4, 4, 4, '5:07', 'bensound-sweet.mp3'],
            ['Acoustic Breeze', 5, 5, 5, '2:37', 'bensound-acousticbreeze.mp3'],
            ['A new Beginning', 5, 5, 5, '2:35', 'bensound-anewbeginning.mp3'],
            ['Better Days', 5, 5, 5, '2:33', 'bensound-betterdays.mp3'],
            ['Buddy', 5, 5, 5, '2:02', 'bensound-buddy.mp3'],
            ['Clear Day', 5, 5, 5, '1:29', 'bensound-clearday.mp3'],
            ['Tomorrow', 6, 6, 6, '4:54', 'bensound-tomorrow.mp3'],
            ['Ukulele', 6, 6, 6, '2:26', 'bensound-ukulele.mp3'],
            ['The Lounge', 6, 6, 6, '4:16', 'bensound-thelounge.mp3'],
            ['Tenderness', 6, 6, 6, '4:16', 'bensound-tenderness.mp3'],
            ['Funny Song', 7, 7, 7, '3:07', 'bensound-funnysong.mp3'],
            ['Epic', 7, 7, 7, '2:58', 'bensound-epic.mp3'],
            ['Cute', 7, 7, 7, '3:14', 'bensound-cute.mp3'],
        ];
    }
}
