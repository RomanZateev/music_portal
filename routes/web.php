<?php

use App\User;

use App\Song;

use App\Like;

use App\Artist;

use App\SongOfArtist;

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
Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

// композиция
Route::any('/songs/{nameURL}', function($nameURL) {

    $song = Song::where('nameURL', $nameURL) -> first();

    if ($song) 
        return view('songs', ['song' => $song]);
    else 
        abort(404);

})->name('song');

// артист
Route::any('/artists/{nameURL}', function($nameURL){

    $artist = Artist::where('nameURL', $nameURL) -> first();

    if ($artist) 
        return view('artists', ['artist' => $artist]);
    else abort(404);
    
})->name('artist');

// маршрут для поиска трека
Route::any('/search',function(Request $request){

    $q = $request -> input('q');
    
    $songs = Song::where('name','LIKE', $q.'%')->get();

    if(count($songs) > 0)
        return view('index', ['songs' => $songs]);
    else 
        return view('index', ['songs' => $songs])->with('message', 'Ничего не найдено');
});

// лайк на композицию // надо доделать
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