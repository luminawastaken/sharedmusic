<head>
<title>{{$sharedTrack->name}}</title>
<meta property="og:title" content="{{$sharedTrack->name}}" />
<meta property="og:type" content="music.song" />
<meta property="og:url" content="{{$sharedTrack->public_url}}" />
<meta property="og:image" content="{{$sharedTrack->public_cover}}" />
<meta property="og:image:width" content="600" />
<meta property="og:image:height" content="500" />

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
