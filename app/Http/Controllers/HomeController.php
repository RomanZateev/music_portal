<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

use App\Singer;

use App\SongsOfSinger;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $songs = Song::all();

        $singers = Singer::all();

        return view('index', ['songs' => $songs, 'singers' => $singers]);
    }
}
