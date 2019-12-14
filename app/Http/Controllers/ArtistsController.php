<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

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
        return view('artist/create');
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
            'nameURL' => 'required|max:255',
            'image' => 'required|max:255',
            'biograpy' => 'required'
        ]);
        
        Artist::create($request->all());

        return redirect()->route('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nameURL)
    {
        $artist = Artist::where('nameURL', $nameURL) -> first();

        if ($artist) 
            return view('artist/index', ['artist' => $artist]);
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
            'nameURL' => 'required|max:255',
            'image' => 'required|max:255',
            'biograpy' => 'required'
        ]);

        $data = $request->all();
        $user = Artist::find($data['id']);
        $user->fill($data);     
        $user->save();

        return redirect()->route('artists');
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
        return back();
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
}
