<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

use App\Artist;

use App\SongsOfArtist;

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
        return view('index', ['songs' => Song::get()]);
    }
}
