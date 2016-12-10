@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="special-form">
              <a href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}"  alt=""></a>
              <h3 class="text-center">REGISTER</h3>
                @include('flash::message')
                    <hr>
            <form method="POST" action="{{ url('/register') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <!-- input nama -->
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="color-primary">Name</label>
                    <input id="name" type="text" placeholder="Name" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- input username -->
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username" class="color-primary">Username</label>
                    <input class="form-control" placeholder="Username" autofocus="true" name="username" type="text" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- input email -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="color-primary">Email</label>
                    <input class="form-control" placeholder="Email" name="email" type="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <!-- input password -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="color-primary">Password</label>
                    <input class="form-control" placeholder="Password" name="password"  id="password" type="password" autofocus="true" >
                    <!-- tampil password -->
                    <div class="checkbox pull-right">
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

                <!-- input password_confirmation -->
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password_confirmation" class="color-primary">Password</label>
                    <input class="form-control" placeholder="Password" name="password_confirmation"  id="password_confirmation" type="password" autofocus="true" >
                </div>

                <br/>
                <br/>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-wide">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>

               

            </form>
            <p>apakah anda punya akun? <a href="{{ url('login') }}">login</a></p>

            </div>
        </div>
    </div>
</div>
@endsection
