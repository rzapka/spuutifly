<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;
    use HasFactory;


    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public function genre()
    {
        return $this->hasOne(Genre::class);
    }

    public function artist()
    {
        return $this->BelongsTo(Artist::class);
    }
}
