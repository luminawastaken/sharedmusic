@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Your dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                      <thead>
                      <th>id</th>
                      <th>artist</th>
                      <th>name</th>
                      <th>path</th>
                      <th>cover</th>
                      </thead>
                    <?php foreach ($playlist as $key => $track): ?>
                      <tr>
                        <td>{{$track->id}}</td>
                        <td>{{$track->artist_name}}</td>
                        <td><a href="/{{$track->share_url}}">{{$track->name}}</a></td>
                        <td>{{$track->publicPath}}</td>
                        <td>{{$track->coverPath}}</td>
                      </tr>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
