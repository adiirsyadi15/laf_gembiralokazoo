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
    <h4>Edit Identitas</h4>
     <hr>
        <div class="formsetting">
           <div class="col-md-6">
            <h4>identitas 1</h4>
            <hr>
            {!! Form::model($identitas_1, ['route' => ['pemilik.identitas.update', $pemiliks->username], 'method' =>'patch' , 'enctype'=>'multipart/form-data', 'id'=>'identitas'])!!}

            <div class="form-group  {!! $errors->has('jenis_1') ? 'has-error' : '' !!}">
                <div class="form-group">
                    <label for="jenis_1">Jenis Identitas</label>
                    {!! Form::select('jenis_1', ['ktp' => 'ktp', 'sim' => 'sim', 'stnk' => 'stnk', 'instansi' => 'instansi'], $identitas_1->jenis_identitas, ['class'=>'form-control']) !!}
                </div>
                    {!! $errors->first('jenis_1', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group  {!! $errors->has('nomor_1') ? 'has-error' : '' !!}">
                <div class="form-group">
                    <label for="nomor_1">nomor</label>
                    {!! Form::text('nomor_1', $identitas_1->nomor_identitas, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
                </div>
                {!! $errors->first('nomor_1', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('gambar_1') ? 'has-error' : '' !!}">
              {!! Form::label('gambar_1', 'Gambar') !!}
              {!! Form::file('gambar_1', null, ['class'=>'form-control']) !!}
              {!! $errors->first('gambar_1', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
        
        <div class="col-md-6">
            <h4>identitas 2</h4>
            <hr>
            <div class="form-group  {!! $errors->has('jenis_2') ? 'has-error' : '' !!}">
                <div class="form-group">
                    <label for="jenis_2">Jenis Identitas</label>
                    {!! Form::select('jenis_2', ['ktp' => 'ktp', 'sim' => 'sim', 'stnk' => 'stnk', 'instansi' => 'instansi'], $identitas_2->jenis_identitas, ['class'=>'form-control']) !!}
                </div>
                {!! $errors->first('jenis_2', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group  {!! $errors->has('nomor_2') ? 'has-error' : '' !!}">
                <div class="form-group">
                    <label for="nomor_2">nomor</label>
                    {!! Form::text('nomor_2', $identitas_2->nomor_identitas, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
                </div>
                {!! $errors->first('nomor_2', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('gambar_2') ? 'has-error' : '' !!}">
              {!! Form::label('gambar_2', 'Gambar') !!}
              {!! Form::file('gambar_2', null, ['class'=>'form-control']) !!}
              {!! $errors->first('gambar_2', '<p class="help-block">:message</p>') !!}
            </div> 
        </div>

        <input type="checkbox" id="setuju" >
          <a role="button" data-toggle="collapse" href="#pernyataan" aria-expanded="false" aria-controls="pernyataan">
          penyataan
          </a>
          <div class="collapse" id="pernyataan">
            <blockquote class="blockquote">
              <p class="mb-0">Apakah Anda setuju dengan pernyataan ini?</p>
              <footer class="blockquote-footer">
              <p>data yang diinputkan harus dari instansi yang valid</p>
              <p>perubahan data akan membuat status verifikasi anda hilang</p>
              <p>tunggu sampai proses verifikasi untuk menggunakan layanan ini kembali</p>
              </footer>
            </blockquote>
          </div>

            
          <br>
          <input type="submit" id="simpandata" class="submit btn btn-success" value="Simpan" disabled="disabled"/>


        {!! Form::close() !!}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection