<section id="header">
<nav class="navbar navbar-fixed-top" data-spy="affix" role="navigation" data-offset-top="197">
  <div class="navbar-inner">
    <div class="container ">
      <div class="col-md-3">
        <button type="button" class="btn btn-navbar glyphicon glyphicon-align-justify" data-toggle="collapse" data-target="#navigation"></button>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- Logo -->
        <!-- <a href="index.html" class="navbar-brand"><img src="{{ url('images/gembira-loka-zoo.png') }}" alt="LostFound Logo" class="images_header"></a> -->
        <a href="{{ url('/') }}" class="navbar-brand navbartitle"><h1 >Lost and Found</h1></a>
      </div>
    <div class="col-md-9">
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav  navbar-right">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home </a></li>
          <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Kehilangan <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a href="#">Tulis Kehilangan</a></li>
          <li><a href="#">Lihat kehilangan</a></li>
          </ul>
          </li> -->
          <li><a href="{{ url('/kehilangan') }}"><i class="fa fa-mobile"></i> Kehilangan </a></li>
          <li><a href="{{ url('/penemuan') }}"><i class="glyphicon glyphicon-eye-open"></i> Penemuan </a></li>

          <li><a href="#"><i class="fa fa-user"></i> Contact</a></li>

          @if (Auth::guest())
          <li class="dropdown">
          <a href="#" class="dropdown-toggle dropdown-sign" data-toggle="dropdown">Sign in <b class="caret"></b></a>
            <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
              <li>
                <div class="row">
                  <div class="col-md-12">
                    <form class="form" method="post" action="{{ url('/login') }}" accept-charset="UTF-8" id="login-nav">
                      {{ csrf_field() }}
                      <div class="form-group">
                      <label class="sr-only" for="exampleInputEmail2">username</label>
                      <input type="text" class="form-control" id="exampleInputEmail2" placeholder="User Name" required name="username">
                      </div>

                      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                      <label class="sr-only" for="exampleInputPassword2">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group">
                      <button type="submit" class="btn btn-block" name="login">LOGIN</button>
                      </div>

                      <div class="lupapassword">
                      <h5><a href="#" >lupa password?</a> <a href="{{ url('register') }}" class="pull right">daftar</a></h5>
                      </div>
                    </form>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->username }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                <?php 
                $username = Auth::user()->username;
                ?>
              @if(Auth::user()->username == "admin")
                
                <!-- dashboard -->
                <li><a href="{{ url('admin') }}"><i class="glyphicon glyphicon-user"></i> Dashboard</a></li>
                <!-- profile -->
                <li><a href="{{ url('admin/profile').'/'.$username }}"><i class="glyphicon glyphicon-user"></i> User Profile</a></li>
              @elseif(Auth::user()->username == "petugas")
                <!-- dashboard -->
                <li><a href="{{ url('petugas') }}"><i class="glyphicon glyphicon-user"></i> Dashboard</a></li>
                <!-- profile -->
                <li><a href="{{ url('petugas/profile').'/'.$username }}"><i class="glyphicon glyphicon-user"></i> User Profile</a></li>
              @else
                <!-- dashboard -->
                <li><a href="{{ url('/') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <!-- profile -->
                <li><a href="{{ url('profile').'/'.$username }}"><i class="glyphicon glyphicon-user"></i> User Profile</a></li>
              
              @endif

                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
    </div>
  </div>
</nav>
 </section>