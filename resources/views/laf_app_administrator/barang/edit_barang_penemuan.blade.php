@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="isi-konten">

	<h4>Tambah barang</h4>
	<hr>
	{!! Form::model($barangs, ['route' => ['pengolahan.penemuan.update_barang', $id_proses, $id_barang] , 'enctype'=>'multipart/form-data'])!!}

	@include('laf_app_administrator.barang._edit_barang')

	{!! Form::close() !!}
</div>
@endsection
