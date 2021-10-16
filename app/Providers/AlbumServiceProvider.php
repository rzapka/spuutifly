<?php

namespace App\Providers;

use App\Repository\AlbumRepository;
use Illuminate\Support\ServiceProvider;

class AlbumServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AlbumRepository::class,
        \App\Repository\Album\AlbumRepository::class);
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
