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

//index
Route::get('/', 'HomeController@index')->name('index');

//index
Route::get('/home', 'HomeController@index')->name('index');


//пользователи
Route::get('/users', function(Request $request){

    return view('users', ['users' => User::orderBy('type')->paginate(25)]);

})->name('users');

// пользователь
Route::any('/user/{id}', function($id) {

    $user = User::where('id', $id) -> first();

    if ($user) 
        return view('user', ['user' => $user]);
    else 
        abort(404);

})->name('user');

//добавление пользователя
Route::get('/user/add', 'UserController@index')->name('user_add');

//артисты
Route::get('/artists', function(Request $request){

    $russian = ['A', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Э', 'Ю', 'Я'];

    $english = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    return view('artists', ['artists' => Artist::orderBy('name')->paginate(18), 'russian' => $russian, 'english' => $english]);

})->name('artists');

//артист
Route::any('/artist/{nameURL}', function($nameURL){

    $artist = Artist::where('nameURL', $nameURL) -> first();

    if ($artist) 
        return view('artist', ['artist' => $artist]);
    else abort(404);
    
})->name('artist');

//поиск артиста
Route::any('/artists/{letter}', function($letter){

    $artists = Artist::where('name','LIKE', $letter.'%')->orderBy('name')->paginate(25);

    $russian = ['A', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Э', 'Ю', 'Я'];

    $english = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    if(count($artists) > 0)
        return view('artists', ['artists' => $artists, 'russian' => $russian, 'english' => $english]);
    else 
        return view('artists', ['message' => 'Ничего не найдено', 'russian' => $russian, 'english' => $english]);
})->name('search_artist');


//композиции
Route::get('/songs', function(Request $request){

    return view('songs', ['songs' => Song::orderBy('name')->paginate(25)]);

})->name('songs');
// композиция
Route::any('/song/{nameURL}', function($nameURL) {

    $song = Song::where('nameURL', $nameURL) -> first();

    if ($song) 
        return view('song', ['song' => $song]);
    else 
        abort(404);

})->name('song');

//поиск композиции
Route::any('/search',function(Request $request){
    
    $songs = Song::where('name','LIKE', $request -> input('q').'%')->orderBy('name')->paginate(25);

    if(count($songs) > 0)
        return view('songs', ['songs' => $songs]);
    else 
        return view('songs', ['message' => 'Ничего не найдено']);
});


Auth::routes();

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');


// лайк на композицию
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