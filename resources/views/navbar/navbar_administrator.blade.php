<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            LaF | GLZ
        </a>
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right navkanan">
            <!-- Authentication Links -->
        
            <!-- dropdown user -->

             @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Sign In</a></li>
                    <li><a href="{{ url('/register') }}">Sign Up</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="glyphicon glyphicon-triangle-bottom"></span> 
                            <!-- <i class="glyphicon glyphicon-user "></i>   -->
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><i class="glyphicon glyphicon-user"></i> User Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                             </li>
                        </ul>
                    </li>
            @endif
        </ul>
    </div>
</nav>



