@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            
            <div class="special-form">
              <a href="{{ url('/') }}"><img src="{{ url('images/logo.png') }}"  alt=""></a>
              <h3 class="text-center">Reset password</h3>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 color-primary">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection
