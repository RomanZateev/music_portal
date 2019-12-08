<?php

use App\Song;

use App\Singer;

use App\SongsOfSinger;

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

/*
Route::get('/', function () {
    return view('index');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::any('/song/{nameURL}', function($nameURL){
    $song = Song::where('nameURL', $nameURL) -> first();

    if (count($songs)>0)
        return view('song', ['song' => $song]);
    else
        return view('404');
});

// маршрут для поиска трека или исполнителя
Route::any('/search',function(Request $request){
    $q = $request -> input('q');
    $songs = Song::where('name','LIKE', $q.'%')->get();
    if(count($songs) > 0)
        return view('index', ['songs' => $songs]);
    else return view('index', ['songs' => $songs])->with('message', 'К сожалению, ничего не найдено. Попробуйте еще раз');
});