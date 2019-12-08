<?php

use App\Song;

use App\Singer;

use App\SongsOfSinger;

use Illuminate\Support\Facades\Input;

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

// маршрут для поиска трека или исполнителя, надо поправить
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('welcome')->withDetails($user)->withQuery ( $q );
    else return view ('welcome')->withMessage('No Details found. Try to search again !');
});