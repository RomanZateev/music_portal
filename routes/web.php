<?php

use App\User;

use App\Song;

use App\Artist;

use Illuminate\Http\Request;

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

//index
Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('index');

//auth
Auth::routes();

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');
/*
|--------------------------------------------------------------------------
| ПОЛЬЗОВАТЕЛЬ
|--------------------------------------------------------------------------
*/
//пользователи
Route::get('/users', 'UserController@all')->name('users');
//отображение
Route::get('/user/{id}', 'UserController@show')->name('user');
//удаление
Route::delete('user/delete/{user_id}', 'UserController@destroy')->name('user_delete');
//изменение
Route::get('user/edit/{user_id}','UserController@edit')->name('user_edit');
Route::post('user/update', 'UserController@update')->name('user_update');
//добавление
Route::get('users/create','UserController@create')->name('user_create');
Route::post('users/store','UserController@store')->name('user_store');

/*
|--------------------------------------------------------------------------
| АРТИСТ
|--------------------------------------------------------------------------
*/
//артисты
Route::get('/artists', 'ArtistsController@all')->name('artists');
//отображение
Route::any('/artist/{artist_id}', 'ArtistsController@show')->name('artist');
//удаление
Route::delete('artist/delete/{artist_id}', 'ArtistsController@destroy')->name('artist_delete');
//изменение
Route::get('artist/edit/{artist_id}','ArtistsController@edit')->name('artist_edit');
Route::post('artists/update', 'ArtistsController@update')->name('artists_update');
//добавление
Route::get('artists/create','ArtistsController@create')->name('artists_create');
Route::post('artists/store','ArtistsController@store')->name('artist_store');
//поиск артиста по букве
Route::any('/artists/{letter}', 'ArtistsController@search')->name('search_artist');
//добавление композиций
Route::post('/artist/{artist_id}/songs/add', 'ArtistsController@add_song')->name('artist_add_song');
Route::delete('artist/{artist_id}/songs/{song_id}/delete', 'ArtistsController@delete_song')->name('artist_delete_song');

/*
|--------------------------------------------------------------------------
| КОМПОЗИЦИИ
|--------------------------------------------------------------------------
*/
//композиции
Route::get('/songs', function(Request $request){

    return view('songs', ['songs' => Song::orderBy('name')->paginate(25)]);

})->name('songs');
// отображение
Route::get('/song/{id}', 'SongsController@show')->name('song');

//поиск композиции
Route::any('/search',function(Request $request){
    
    $songs = Song::where('name','LIKE', $request -> input('q').'%')->orderBy('name')->paginate(25);

    if(count($songs) > 0)
        return view('songs', ['songs' => $songs]);
    else 
        return view('songs', ['message' => 'Ничего не найдено']);
});