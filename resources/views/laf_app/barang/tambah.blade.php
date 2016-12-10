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
    <h4>Tambah Barang</h4>
     <hr>
        <div class="formsetting">
          <div class="col-md-12">

          {!! Form::open(['route' => ['pemilik.barang.simpan', $username, $id_proses], 'enctype'=>'multipart/form-data', 'id'=>'identitas']) !!}
            <div class="form-group  {!! $errors->has('nama_barang') ? 'has-error' : '' !!}">
              <div class="form-group">
              <label for="nama_barang">nama barang</label>
              {!! Form::text('nama_barang', null, ['class'=>'form-control', 'placeholder'=>'masukkan nama barang']) !!}
              </div>
              {!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group  {!! $errors->has('kategori') ? 'has-error' : '' !!}">
                <div class="form-group">
                    <label for="kategori">kategori</label>
                    {!! Form::select('id_kategori', $kategoris, null,['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('kategori', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('ciri_ciri') ? 'has-error' : '' !!}">
              {!! Form::label('ciri_ciri', 'ciri ciri') !!}
              {!! Form::textarea('ciri_ciri', null, ['class'=>'form-control']) !!}
              {!! $errors->first('ciri_ciri', '<p class="help-block">:message</p>') !!}
            </div>

<!-- 
            <div class="form-group {!! $errors->has('status_kehilangan') ? 'has-error' : '' !!}">
              {!! Form::label('status_kehilangan', 'status_kehilangan') !!}
             {!! Form::select('status_kehilangan', ['hilang' => 'hilang', 'ditemukan'=>'ditemukan'], 'hilang', ['class'=>'form-control']) !!}
              {!! $errors->first('status_kehilangan', '<p class="help-block">:message</p>') !!}
            </div>
 -->
            <div class="form-group {!! $errors->has('foto_barang_1') ? 'has-error' : '' !!}">
              {!! Form::label('foto_barang_1', 'foto barang 1') !!}
              {!! Form::file('foto_barang_1', null, ['class'=>'form-control']) !!}
              {!! $errors->first('foto_barang_1', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('foto_barang_2') ? 'has-error' : '' !!}">
              {!! Form::label('foto_barang_2', 'foto barang 2') !!}
              {!! Form::file('foto_barang_2', null, ['class'=>'form-control']) !!}
              {!! $errors->first('foto_barang_2', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('foto_barang_3') ? 'has-error' : '' !!}">
              {!! Form::label('foto_barang_3', 'foto barang 3') !!}
              {!! Form::file('foto_barang_3', null, ['class'=>'form-control']) !!}
              {!! $errors->first('foto_barang_3', '<p class="help-block">:message</p>') !!}
            </div>
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