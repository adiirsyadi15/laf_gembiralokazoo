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
  <h3 class="panel-title">PROFILE</h3>

  </div>
<div class="panel-body">
  <div class="col-sm-6 col-md-3">
    <div class="thumbnail ">
      <img src="{{ url('images/fotoprofile/'.$profiles->foto_profile) }}"  class="img-rounded fotoadmin" alt="Generic placeholder thumbnail">
      <div class="caption">
        <!-- <button type="button" class="btn btn-success pull-rigth">EDIT FOTO</button> -->
      </div>
    </div>
  </div>
<div class="col-md-9">
  <form class="form-horizontal">
    <div class="form-group adminprofilelabel">
      <h5 class="adminprofilelabel"><b>Informai Umum</b></h5>

      <!-- nama -->
      <div class="row">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
        <p class="form-control-static">{{ $profiles->nama }}</p>
        </div>
      </div>
      
      <!-- alamat -->
      <label class="col-sm-2 control-label">alamat</label>
      <div class="col-sm-10">
      <p class="form-control-static">{{ $profiles->alamat }}</p>
      </div>

      <!-- jenis kelamin -->
      <div class="row">
        <label class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
        @if($profiles->jenis_kelamin == 'L')
        <p class="form-control-static">
          laki-laki
        </p>
        @else
        <p class="form-control-static">
          Perempuan
        </p>
        @endif
        </div>
      </div>

      <!-- tempat tanggal lahir -->
      <div class="row">
        <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $profiles->tempat_lahir }}, {{ $profiles->tanggal_lahir }}</p>
        </div>
      </div>

      <!-- agama -->
      <div class="row">
        <label class="col-sm-2 control-label">Agama</label>
        <div class="col-sm-10">
          <p class="form-control-static">{{ $profiles->agama }}</p>
        </div>
      </div>

      <br/>
      <br/>
      <h5><b>Informai Kontak</b></h5>
      <label class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <p class="form-control-static">{{ Auth::user()->email }}</p>
      </div>
      <label class="col-sm-2 control-label">
      hp</label>
      <div class="col-sm-10">
      <p class="form-control-static">{{ $profiles->no_hp }}</p>
      </div>
      <label class="col-sm-2 control-label">User Akses</label>
      <div class="col-sm-10">
      <p class="form-control-static"><span class="label label-primary">{{ Auth::user()->role }}</span></p>
      </div>
    </div>
  </form>
</div>
</div>
</div>

</div>
</div> 



</div> 

@endsection
       
   