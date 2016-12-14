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
	{!! Form::open(['route' => ['pengolahan.penemuan.simpan_barang', $id_proses], 'enctype'=>'multipart/form-data', 'id'=>'identitas']) !!}

	@include('laf_app_administrator.barang._barang')

	{!! Form::close() !!}
</div>
@endsection
