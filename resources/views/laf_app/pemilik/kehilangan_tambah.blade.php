@extends('layouts.app_laf')
@section('content')
<div class="container">
  <div class="col-md-3">
    <div class="profile">
      @include('laf_app.pemilik._panelprofile')
    </div>
  </div>
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-12">
        <div class="profile">
       
	          <div class="col-md-12">

            {!! Form::open(['route' => ['pemilik.kehilangan.simpan',$username], 'enctype'=>'multipart/form-data', 'id'=>'tambah_kehilangan']) !!}

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('laf_app.pemilik._kejadian') 

            @include('laf_app.pemilik._barang') 

            {!! Form::close() !!}

	          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<br><br>


@include('home.footer')
@endsection