@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="isi-konten">
@foreach($kejadians as $k)
	<h4>Rubah kejadian
	</h4>
	@include('flash::message')
	<div class="col-md-12">
		<!-- route untuk penemuan edit kejadian -->
		{!! Form::model($kejadians, ['route' => ['pengolahan.penemuan.updatekejadian', $id_proses, $k->id_kejadian], 'method' => 'patch']) !!}

		@include('laf_app_administrator.kejadian._kejadian')

		{!! Form::close() !!}
	</div>
@endforeach

</div>
@endsection
