@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="row">
  <div class="isi-konten">
    <div class="panelprofile">
      <div class="panel panel-default ">
      <div class="panel-heading">
        <h3 class="panel-title">Admin</h3>

      </div>
      <div class="panel-body">
      @foreach($petugas as $p)
         <div class="col-sm-6 col-md-3">
          <div class="thumbnail ">
            <img src="{{ url('images/fotoprofile/'.$p->foto_profile) }}"  class="img-rounded fotoadmin" alt="Generic placeholder thumbnail">
            <div class="caption">
                <button type="button" class="btn btn-success pull-rigth">EDIT FOTO</button>
            </div>
          </div>
        </div>
       <div class="col-md-9 col-lg-6">
          <form class="form-horizontal">
            <div class="form-group adminprofilelabel">
              <h5 class="adminprofilelabel"><b>Informai Umum</b></h5>
              <label class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->nama }}</p>
              </div>

              <!-- usernmae -->
              <label class="col-sm-3 control-label">Username</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->username }}</p>
              </div>

              <!-- jenis kelamin -->
              <label class="col-sm-3 control-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                <p class="form-control-static">
                  @if ($p->jenis_kelamin == "L")
                        <span >{{ "Laki-laki" }}
                        </span>
                  @else
                        <span >{{ "Perempuan" }}</span>
                  @endif
                </p>
              </div>

              <!-- tempat lahr -->
              <label class="col-sm-3 control-label">Tempat Lahir</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->tempat_lahir }}</p>
              </div>
              <!-- tgl lahir -->
              <label class="col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->tanggal_lahir }}</p>
              </div>

              <label class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->alamat }}</p>
              </div>

              <label class="col-sm-3 control-label">Agama</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->agama }}</p>
              </div>
              
              <label class="col-sm-3 control-label">admin status</label>
              <div class="col-sm-9">
                <p class="form-control-static">
                    @if ($p->active == "1")
                        <span class="btn btn-success btn-xs" >{{ "Aktif" }}</span>
                    @else
                        <span class="btn btn-danger btn-xs">{{ "tidak Aktif" }}</span>
                      @endif
                </p> <br/>
              </div>

              <br/>
               <br/>
               <br/>
               <br/>
              <h5><b>Informai Kontak</b></h5>
              <label class="col-sm-3 control-label">Alamat Email</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->email }}</p>
              </div>
              <label class="col-sm-3 control-label">Nomor hp</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->no_hp }}</p>
              </div>
              <label class="col-sm-3 control-label">User Akses</label>
              <div class="col-sm-9">
                <p class="form-control-static">{{ $p->role }}<span class="label label-primary"></span></p>
              </div>
            </div>
          </form>

      @endforeach
      </div>
    </div>
    </div>
    </div>
  </div> 
</div> 
@endsection
       
   