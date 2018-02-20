@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('artist/upload') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="trackName" class="col-md-4 col-form-label text-md-right">Track Name</label>

                            <div class="col-md-6">
                                <input id="trackName" type="text" class="form-control{{ $errors->has('trackName') ? ' is-invalid' : '' }}" name="trackName" value="{{ old('trackName') }}" required autofocus>

                                @if ($errors->has('trackName'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('trackName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trackFile" class="col-md-4 col-form-label text-md-right">Audio</label>

                            <div class="col-md-6">
                                <input id="trackFile" type="file" accept="audio/*" class="form-control{{ $errors->has('trackFile') ? ' is-invalid' : '' }}" name="trackFile" value="{{ old('trackFile') }}" required autofocus>

                                @if ($errors->has('trackFile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('trackFile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="coverFile" class="col-md-4 col-form-label text-md-right">Cover File</label>

                            <div class="col-md-6">
                                <input id="coverFile" type="file" accept="image/*" class="form-control{{ $errors->has('coverFile') ? ' is-invalid' : '' }}" name="coverFile" value="{{ old('trackFile') }}" required autofocus>

                                @if ($errors->has('coverFile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('coverFile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
