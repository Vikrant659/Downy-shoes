@extends('layouts.full')

@section('content')
@if(Session::has('error'))
<div class="row">
    <div class="alert alert-danger alert-dismissible col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning!</strong> {{  Session::get('error') }}
    </div>
</div>
@endif
@if(Session::has('success'))
<div class="row">
    <div class="alert alert-success alert-dismissible col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{  Session::get('success') }}
    </div>
</div>
@endif
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update1') }}">
                        @csrf
                        <input type = "hidden" name ="_method" value = "PATCH" />
                        <input type = "hidden" name ="id", value = "{{$user->id}}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" style = "background-color:black;border-color:black" class="btn btn-primary" action>
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@endsection