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

		{!! Form::model($kejadians, ['route' => ['pengolahan.kehilangan.updatekejadian', $id_proses, $k->id_kejadian], 'method' => 'patch']) !!}

			<input type="hidden" name="id_kejadian" value="{{ $k->id_kejadian }}">

			<div class="form-group  {!! $errors->has('hari') ? 'has-error' : '' !!}">
				<div class="form-group">
				<label for="hari">hari</label>
				{!! Form::select('hari', ['senin' => 'senin', 'selasa' => 'selasa', 'rabu' => 'rabu', 'kamis' => 'kamis','jumat' => 'jumat','sabtu' => 'sabtu','minggu' => 'minggu',], $k->hari, ['class'=>'form-control']) !!}
				</div>
				{!! $errors->first('hari', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group  {!! $errors->has('waktu') ? 'has-error' : '' !!}">
			<div class="form-group">
			<label for="waktu">waktu</label>
			{!! Form::text('waktu', $k->waktu, ['class'=>'form-control']) !!}
			</div>
			{!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group {!! $errors->has('tanggal_kejadian') ? 'has-error' : '' !!}">
			{!! Form::label('tanggal_kejadian', 'tanggal kejadian') !!}
			{!! Form::date('tanggal_kejadian', $k->tanggal, ['class'=>'form-control']) !!}
			{!! $errors->first('tanggal_kejadian', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group {!! $errors->has('lokasi') ? 'has-error' : '' !!}">
			{!! Form::label('lokasi', 'lokasi') !!}
			{!! Form::textarea('lokasi', $k->lokasi, ['class'=>'form-control']) !!}
			{!! $errors->first('lokasi', '<p class="help-block">:message</p>') !!}
			</div>

			<div class="form-group {!! $errors->has('keterangan') ? 'has-error' : '' !!}">
			{!! Form::label('keterangan', 'keterangan') !!}
			{!! Form::textarea('keterangan', $k->keterangan, ['class'=>'form-control']) !!}
			{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
			</div>

			<input type="submit" class="submit btn btn-success" value="Simpan"/>
		{!! Form::close() !!}
	</div>
@endforeach

</div>
@endsection
