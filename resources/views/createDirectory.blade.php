@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{Auth::user()}}
                    <br>
                    {{public_path().'/artist/'.Auth::user()->id}}
                    <br>
                    You are logged in!

                    <form enctype="multipart/form-data" id="upload_form" role="form" method="POST" action="" >
     <div class="form-group">
       <label for="catagry_name">Name</label>
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
       <input type="text" class="form-control" id="catagry_name" placeholder="Name">
       <p class="invalid">Enter Catagory Name.</p>
     </div>
     <div class="form-group">
       <label for="catagry_name">Logo</label>
       <input type="file" accept='audio/*' class="form-control" id="catagry_logo">
       <p class="invalid">Enter Catagory Logo.</p>
   </div>

   </form>
   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
