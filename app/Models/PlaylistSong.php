<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    use HasFactory;
    protected $fillable = ['song_id', 'playlist_id', 'title'];

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class);
    }
}
