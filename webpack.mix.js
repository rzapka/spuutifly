const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/albums.js', 'public/js')
    .js('resources/js/album.js', 'public/js')
    .js('resources/js/playlist.js', 'public/js')
    .js('resources/js/searchAlbums.js', 'public/js')
    .js('resources/js/searchPlaylists.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/register&login.scss', 'public/css')
    .sourceMaps();
mix.browserSync('127.0.0.1:8000');
