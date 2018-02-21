<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Track;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $playlist = Track::where('artist_id','=',Auth::user()->id)->get();
      foreach ($playlist as $track) {
        $track->artist_name = Auth::user()->name;
        $track->share_url = $track->artist_name.'/'.$track->id.'/'.$track->name;
      }

      return view('home',['playlist' => $playlist]);
    }

    public function info()
    {
        return view('info');
    }

    public function createDirectory()
    {
      $path = public_path().'/artist/'.Auth::user()->id;
      if(!File::exists($path)){
        File::makeDirectory($path, 0777);
      }
      return view('createDirectory');
    }
}
