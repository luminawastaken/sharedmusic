<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
use App\Track;
use App\User;

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

    public function viewTrack($artist_name,$id,$trackName)
    {
      $artist = User::where('name','=',$artist_name)->get();
      $track = Track::where([['artist_id','=',$artist->first()->id],['id','=',$id]])->get();
      $sharedTrack = $track->first();
      $sharedTrack->artist = $artist->first()->name;
      $sharedTrack->public_url = url('/'.$sharedTrack->artist.'/'.$sharedTrack->id.'/'.$sharedTrack->name);
      $sharedTrack->public_cover = str_replace(' ','%20',asset($sharedTrack->coverPath));

      //$sharedTrack->name = str_replace(' ','-',$sharedTrack->name);
      return view('share/player',['sharedTrack' => $sharedTrack]);
    }
}
