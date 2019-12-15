<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Song;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ArtistsController extends Controller
{
    private $russian = ['A', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Э', 'Ю', 'Я'];

    private $english = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artist/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artist/create', ['songs' => Song::all()]);
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
            'biograpy' => 'required',
            //'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
        
        $cover = $request->file('file');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
    
        $artist = new Artist();
        $artist->name = $request->name;
        $artist->image = $request->image;
        $artist->biograpy = $request->biograpy;
        $artist->mime = $cover->getClientMimeType();
        $artist->original_filename = $cover->getClientOriginalName();
        $artist->filename = $cover->getFilename().'.'.$extension;
        $artist->save();
    
        return redirect()->route('artists')
            ->with('success','Artist added successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::where('id', $id) -> first();

        if ($artist) 
            return view('artist/index', ['artist' => $artist, 'songs' => Song::all()]);
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
        return view('artist/edit', ['artist' => Artist::where('id', $id)->first()]);
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
            'biograpy' => 'required',
            //'file' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);
        
        $cover = $request->file('file');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
    
        $artist = Artist::find($request->id);
        $artist->name = $request->name;
        $artist->image = $request->image;
        $artist->biograpy = $request->biograpy;
        $artist->mime = $cover->getClientMimeType();
        $artist->original_filename = $cover->getClientOriginalName();
        $artist->filename = $cover->getFilename().'.'.$extension;
        $artist->save();
    
        return redirect()->route('artists')
            ->with('success','Artist edited successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artist::find($id)->delete();
        return redirect()->route('artists');
    }

    public function search($letter)
    {
        $artists = Artist::where('name','LIKE', $letter.'%')->orderBy('name')->paginate(25);
    
        if(count($artists) > 0)
            return view('artists', ['artists' => $artists, 'russian' => $this->russian, 'english' => $this->english]);
        else 
            return view('artists', ['message' => 'Ничего не найдено', 'russian' => $this->russian, 'english' => $this->english]);
    }
    
    public function all()
    {    
        return view('artists', ['artists' => Artist::orderBy('name')->paginate(18), 'russian' => $this->russian, 'english' => $this->english]);
    }

    public function add_song(Request $request)
    {
        $data = $request->all();

        $song = DB::table('artist_song')
        ->where('artist_id', $data['artist_id'])
        ->where('song_id', $data['song_id'])
        ->first();

        if (!$song)
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

    public function delete_song($artist_id, $song_id)
    {
        DB::table('artist_song')
        ->where('artist_id', '=', $artist_id)
        ->where('song_id', '=', $song_id)
        ->delete();

        return back();
    }
}
