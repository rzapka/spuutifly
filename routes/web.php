<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Album
Route::get('/', 'AlbumController@index')
    ->name('get.albums');

Route::post('/search-albums', 'AlbumController@searchAlbumsByPhrase')
    ->name('search.albums');


Route::get('/album={id}', 'AlbumController@show')
    ->name('get.album');



// Playlist

Route::get('/playlisty', 'PlaylistController@index')
    ->name('get.playlists');

Route::post('/playlists', 'PlaylistController@store')
    ->name('playlists.store');

Route::get('/playlista/{id}', 'PlaylistController@show')
    ->name('get.playlist');

Route::delete('/playlist/{id}', 'PlaylistController@destroy')
    ->name('playlist.destroy');

Route::post('/add-to-playlist', 'PlaylistController@addSongToPlaylist')
    ->name('add.to.playlist');

Route::delete('/rm-from-playlist/{id}', 'PlaylistController@removeSongFromPlaylist')
    ->name('remove.from.playlist');

Route::post('/search-playlists', 'PlaylistController@searchPlaylistsByPhrase')
    ->name('search.playlists');

// User

Route::get('/profil', 'UserController@profile')
    ->name('get.profile');

Route::get('/edytuj-profil', 'UserController@edit')
    ->name('edit.profile');

Route::patch('/update_profile_data', 'UserController@update')
    ->name('update.profile');

Auth::routes();
