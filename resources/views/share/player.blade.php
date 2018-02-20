<head>
<title>{{$sharedTrack->name}}</title>
<meta property="og:title" content="{{$sharedTrack->name}}" />
<meta property="og:type" content="music.song" />
<meta property="og:image" content="{{str_replace(' ','%20',asset($sharedTrack->coverPath))}}" />
<meta property="og:url" content="{{url('/track/'.$sharedTrack->artist_id.'/'.$sharedTrack->id.'/'.$sharedTrack->name)}}" />

</head>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{$sharedTrack->name}}</div>

                <div class="card-body">
                  <img src="{{asset($sharedTrack->coverPath)}}" class="img-fluid">
                  <audio src="{{asset($sharedTrack->publicPath)}}" controls>
                  </audio>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
