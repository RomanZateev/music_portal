<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Like;
use App\Song;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/create');
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
            'email' => 'required|max:255',
            'type' => 'required|max:255',
            'password' => 'required'
        ]);
        
        $request['password'] = bcrypt($request['password']);
        User::create($request->all());

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $likes = Like::select('song_id')->where('user_id', Auth::id());

        $songs = Song::whereIn('id', $likes) ->orderBy('name')->paginate(25);
        
        return view('user/edit', ['user' => User::where('id', Auth::id())->first(), 'songs' => $songs]);

        //добавить пагинацию
        // if (count($songs) > 0)
        //     return view('user/edit', ['user' => User::where('id', Auth::id())->first(), 'songs' => $songs] );
        // else abort(404);

        // if ($user) return view('user', ['user' => $user]);
        // else abort(404);

        //return view('user/edit', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $likes = Like::where('user_id', $user_id);

        foreach ($likes as $like)
        {
            $songs = array_merge($songs, Song::where('id', $like -> song_id)->toarray())->orderBy('name')->paginate(25);
        }

        // $songs = Song::where('name','LIKE', $request -> input('q').'%')->orderBy('name')->paginate(25);

        // if(count($songs) > 0)
        //     return view('songs', ['songs' => $songs]);
        // else 
        //     return view('songs', ['message' => 'Ничего не найдено']);

        return view('user/edit', ['user' => User::where('id', $id)->first(), 'songs' => count($likes)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);

        $data = $request->all();
        $user = User::find($data['id']);
        $user->fill($data);     
        $user->save();

        //return redirect()->route('users');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }

    public function all()
    {
        return view('users', ['users' => User::orderBy('type')->paginate(25)]);
    }
}
