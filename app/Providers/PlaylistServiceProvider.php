<?php

namespace App\Providers;

use App\Repository\PlaylistRepository;
use Illuminate\Support\ServiceProvider;

class PlaylistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlaylistRepository::class,
            \App\Repository\Playlist\PlaylistRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
