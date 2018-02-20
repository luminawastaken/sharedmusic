<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Track;

class ShareController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('viewTrack');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDirectory()
    {
      $path = public_path().'/artist/'.Auth::user()->id;
      if(!File::exists($path)){
        File::makeDirectory($path, 0777);
      }
      return view('createDirectory');
    }

    public function upload()
    {
      return view('share/upload');
    }
    public function uploadPost(Request $request)
    {

      $trackRoute = '/artist/'.Auth::user()->id.'/'.$request->trackName.'.'.$request->file('trackFile')->getClientOriginalExtension();
      $coverRoute = '/artist/'.Auth::user()->id.'/cover'.$request->trackName.'.'.$request->file('coverFile')->getClientOriginalExtension();
      $request->file('trackFile')->move(public_path().'/artist/'.Auth::user()->id.'/', $request->trackName.'.'.$request->file('trackFile')->getClientOriginalExtension());
      $request->file('coverFile')->move(public_path().'/artist/'.Auth::user()->id.'/', 'cover'.$request->trackName.'.'.$request->file('coverFile')->getClientOriginalExtension());
      $track = new Track;
      $track->artist_id = Auth::user()->id;
      $track->name = $request->trackName;
      $track->publicPath = $trackRoute;
      $track->coverPath = $coverRoute;
      $track->save();

      return redirect('home');
    }

    public function viewTrack($artist_id,$id,$trackName)
    {
      $track = Track::where([['artist_id','=',$artist_id],['id','=',$id]])->get();
      $sharedTrack = $track->first();
      return view('share/player',['sharedTrack' => $sharedTrack]);
    }
}
