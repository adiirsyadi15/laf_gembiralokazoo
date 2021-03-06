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
    <a href="#" data-toggle="modal" data-target="#ModalFotoProfile">
      <div class="thumbnail ">
        <img src="{{ url('images/fotoprofile/'.$profiles->foto_profile) }}"  class="img-rounded fotoadmin" alt="Generic placeholder thumbnail">
      </div>
    </a>
    
  </div>
  <div class="col-md-9">
    <form class="form-horizontal">
      <div class="form-group adminprofilelabel">
        <h5 class="adminprofilelabel"><b>Informai Umum</b></h5>

        <!-- nama -->
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
        <p class="form-control-static">{{ $profiles->nama }}</p>
        </div>
        <!-- alamat -->
        <label class="col-sm-2 control-label">alamat</label>
        <div class="col-sm-10">
        <p class="form-control-static">{{ $profiles->alamat }}</p>
        </div>



        <br/>
        <br/>
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
<!-- modal foto profile -->
    <div class="modal fade" id="ModalFotoProfile" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" id="showImg">
          </div>
        </div>
      </div>
    </div>
<!-- tutup modal foto profile -->
</div>
</div> 



</div> 

@endsection
       
   