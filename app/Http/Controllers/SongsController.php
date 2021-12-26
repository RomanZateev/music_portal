<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Song;
use App\Like;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('song.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'text' => 'required'
        ]);

        Song::create($request->all());

        return redirect()->route('songs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::where('id', $id) -> first();

        $likes = Like::where('song_id', $id) -> count();

        if ($song)
            return view('song.index', ['song' => $song, 'artists' => Artist::all(), 'likes' => $likes]);
        else abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('song.edit', ['song' => Song::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'text' => 'required'
        ]);

        $data = $request->all();
        $user = Song::find($data['id']);
        $user->fill($data);
        $user->save();

        return redirect()->route('song', ['song_id' => $request->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Song::find($id)->delete();
        return redirect()->route('songs');
    }

    public function like($song_id)
    {
        $user_id = Auth::id();

        $like = Like::where('song_id', $song_id)->where('user_id', $user_id) -> first();

        if (count($like) > 0)
            Like::find($like -> id)->delete();
        else
        {
            DB::table('likes')->insert(
                [
                    'song_id' => $song_id, 
                    'user_id' => $user_id
                ]
            );
        }

        return back();
    }


    public function search(Request $request)
    {
        $songs = Song::where('name','LIKE', $request -> input('q').'%')->orderBy('name')->paginate(25);

        if(count($songs) > 0)
            return view('songs', ['songs' => $songs]);
        else 
            return view('songs', ['message' => 'Ничего не найдено']);
    }

    public function all()
    {    
        return view('songs', ['songs' => Song::orderBy('name')->paginate(25)]);
    }

    public function add_artist(Request $request)
    {
        $data = $request->all();

        $artist = DB::table('artist_song')
        ->where('artist_id', $data['artist_id'])
        ->where('song_id', $data['song_id'])
        ->first();

        if (!$artist)
        {
            DB::table('artist_song')->insert(
                [
                    'artist_id' => $data['artist_id'], 
                    'song_id' => $data['song_id']
                ]
            );
        }

        return back();
    }

    public function delete_artist($song_id, $artist_id)
    {
        DB::table('artist_song')
        ->where('song_id', '=', $song_id)
        ->where('artist_id', '=', $artist_id)
        ->delete();

        return back();
    }
}
