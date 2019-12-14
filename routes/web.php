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
//обновление
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
Route::any('/artist/{nameURL}', 'ArtistsController@show')->name('artist');
//удаление
Route::delete('artist/delete/{artist_id}', 'ArtistsController@destroy')->name('artist_delete');
//обновление
Route::get('artist/edit/{artist_id}','ArtistsController@edit')->name('artist_edit');
Route::post('artist/update', 'ArtistsController@update')->name('artist_update');
//добавление
Route::get('artist/create','ArtistsController@create')->name('artist_create');
Route::post('artist/store','ArtistsController@store')->name('artist_store');
//поиск артиста по букве
Route::any('/artists/{letter}', 'ArtistsController@search')->name('search_artist');

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
Route::get('/song/{nameURL}', 'SongsController@show')->name('song');

//поиск композиции
Route::any('/search',function(Request $request){
    
    $songs = Song::where('name','LIKE', $request -> input('q').'%')->orderBy('name')->paginate(25);

    if(count($songs) > 0)
        return view('songs', ['songs' => $songs]);
    else 
        return view('songs', ['message' => 'Ничего не найдено']);
});

// лайк на композицию ...
Route::post('/like', function(Request $nameURL){

    $like = Like::where([
        ['user_id', Auth::id()],
        ['song_id,', $nameURL]
    ])->get();

    $like = new Like;
    $song = Song::where('nameURL', $nameURL) -> first();

    $like->song_id = $song->id;
    $like->user_id = Auth::id();

    $flight->save();

    if (count($like) == 1) 
        $like->delete();   
    else{

        $like = new Like;
        $song = Song::where('nameURL', $nameURL) -> first();

        $like->song_id = $song->id;
        $like->user_id = Auth::id();

        $flight->save();
    }
    
    return abort(404);

})->name('like');