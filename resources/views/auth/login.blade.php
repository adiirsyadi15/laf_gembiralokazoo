@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            
  <div class="special-form">
      <a href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}"  alt=""></a>
      <h3 class="text-center">LOGIN</h3>
      @include('flash::message')
            <hr>
    <form method="POST" action="{{ url('/login') }}" accept-charset="UTF-8">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username" class="color-primary">Username:</label>
            <input class="form-control" placeholder="Username" autofocus="true" name="username" type="text">
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="color-primary">Password:</label>
            <input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="showHide" /> show password
                </label>
            </div>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-wide">
                  <i class="fa fa-btn fa-sign-in"></i> Login
              </button>
        </div>
    </form>
    <p>apakah anda belum punya akun? <a href="{{ url('/register')}}">register</a><a href="{{ url('password/reset') }}" class="pull-right">lupa password?</a></p>
   
  </div>

        </div>
    </div>
</div>
@endsection
