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
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>USER</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>PENEMUAN</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-object-align-top"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>KEHILANGAN</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-object-align-bottom"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>LAPORAN</p>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-paperclip"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        
      </div>
  </div>

</div> 

@endsection
       
   