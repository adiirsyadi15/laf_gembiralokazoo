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
        @foreach($kejadians as $k)
          	<h4>Kehilangan
          	</h4>
          	@include('flash::message')
	          <div class="col-md-12">

	          	{!! Form::model($kejadians, ['route' => ['pemilik.kehilangan.kejadianupdate', $k->username, $k->id_proses], 'method' => 'patch']) !!}

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
      </div>
    </div>
  </div>
  
</div>


<!-- @include('home.footer') -->
@endsection