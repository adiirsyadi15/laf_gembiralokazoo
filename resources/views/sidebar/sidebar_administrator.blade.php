<!-- sidebar -->
<!-- panel admin -->

<div class="side-menu">
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-sidebar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       
    </div>


    <div class="collapse navbar-collapse" id="app-sidebar-collapse">
         <div class="brand-wrapper">
          
            <!-- Brand -->
            <div class="brand-name-wrapper">
                <a class="navbar-brand" href="#">
                    
                    Gembora Loka Zoo

                </a>
            </div>

            <!-- Search -->
            <a data-toggle="collapse" href="#search" class="btn btn-default" id="search-trigger">
                <span class="glyphicon glyphicon-search"></span>
            </a>

            <!-- Search body -->
            <div id="search" class="panel-collapse collapse">
                <div class="panel-body">
                    <form class="navbar-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Pencarian">
                        </div>
                        <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                    </form>
                </div>
            </div>
        </div>

    
        <div class="profile">
              <div class="profile_pic">
                <?php $foto = $foto_sidebar->foto_profile; ?>
                <img src="{{ url('images/fotoprofile/'. $foto) }}"  class="img-circle fotoadminsidebar" alt="Generic placeholder thumbnail">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                 <h4><?php $a=Auth::user()->username ?></h4>
                  <h4>{{$a}}</h4>
              </div>
            </div>
    <!-- Main Menu -->
   
        <ul class="nav navbar-nav navigasi-kiri">

            


            @if (Auth::user()->role == 'admin')
                <li ><a href="{{ url('/admin') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                <li class="active"><a href="{{  URL::to('admin/profile', Auth::user()->username)  }}"><span class="glyphicon glyphicon-user "></span> Profile <!-- {{$a}} --></a></li>
            @elseif (Auth::user()->role == 'petugas')
                <li ><a href="{{ url('/petugas') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
                <li class="active"><a href="{{  URL::to('petugas/profile', Auth::user()->username)  }}"><span class="glyphicon glyphicon-user "></span> Profile <!-- {{$a}} --></a></li>
            @else
                <li class="active"><a href=""><span class="glyphicon glyphicon-user "></span> Profile</a></li>
            @endif
            <!-- user -->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-user">
                    <span class="glyphicon glyphicon-hand-right"></span>  User <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-user" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                        @if (Auth::user()->role == 'admin')
                            <li><a href="{{ URL::to('admin/user') }}"><span class="glyphicon glyphicon-cloud"></span> User Akses</a></li>
                            <li><a href="{{ url('/userpetugas') }}"><span class="glyphicon glyphicon-cloud"></span> Petugas</a></li>
                        @endif
                            <li><a href="{{ url('userpemilik') }}"><span class="glyphicon glyphicon-cloud"></span> Pemilik</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            @if (Auth::user()->role == 'petugas')

            <li><a href="#"><span class="glyphicon glyphicon-stats"></span> Barang</a></li>
            <!-- Dropdown-->
            <li class="panel panel-default" id="dropdown">
                <a data-toggle="collapse" href="#dropdown-laf">
                    <span class="glyphicon glyphicon-cd"></span> LaF <span class="caret"></span>
                </a>

                <!-- Dropdown level 1 -->
                <div id="dropdown-laf" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('pengolahan/kehilangan') }}"><span class="glyphicon glyphicon-object-align-bottom"> Kehilangan</span></a></li>
                            <li><a href="{{ url('pengolahan/penemuan') }}"><span class="glyphicon glyphicon-object-align-top"> Penemuan</span></a></li>

                            
                        </ul>
                    </div>
                </div>
            </li>
            <li><a href="#"><span class="glyphicon glyphicon-file"></span> Laporan</a></li>

            @endif
            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>

        </ul>


    </div>
       
</nav>
    
</div>