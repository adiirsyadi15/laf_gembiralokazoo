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

      <h3>Tambah kehilangan</h3>
      {!! Form::open(['route' => ['pengolahan.kehilangan.store'], 'enctype'=>'multipart/form-data', 'id'=>'tambah_kehilangan']) !!}


      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      @include('laf_app_administrator.kehilangan._pemilik') 
      @include('laf_app_administrator.kehilangan._kejadian') 
      @include('laf_app_administrator.kehilangan._barang') 
    
      <input type="submit" name="">
      {!! Form::close() !!}
    </div>
  </div>
</div> 

@endsection
       
   