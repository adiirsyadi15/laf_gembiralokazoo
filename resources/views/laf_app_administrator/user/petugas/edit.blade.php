@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>s="row">
  <div class="isi-konten">
    <div class="panel panel-default ">
      <div class="panel-heading">
      <h3 class="panel-title">Edit Petugas </h3>
       </div>
    <div class="panel-body">
      <div class="col-md-12">

        @include('flash::message')
        {!! Form::model($petugas, ['route' => ['userpetugas.update', $petugas->username], 'method' =>'patch' , 'enctype'=>'multipart/form-data'])!!}
        <!-- usernmae -->
        <div class="form-group {!! $errors->has('petugas->username') ? 'has-error' : '' !!}">
          {!! Form::label('username', 'Username *') !!}
          <input type="text" name="username" class="form-control" value="{{ $petugas->username }}" disabled/>

          {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- email -->
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
          {!! Form::label('email', 'Email *') !!}
          {!! Form::text('email', null, ['class'=>'form-control']) !!}
          {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>


        <!-- nama -->
        <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
          {!! Form::label('nama', 'Nama *') !!}
          <input type="text" name="nama" class="form-control" value="{{ $petugas->petugascall->nama }}" />
          {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {!! $errors->has('jenis_kelamin') ? 'has-error' : '' !!}">
              {!! Form::label('jk', 'Jenis Kelamin *') !!}
              <!-- {!! Form::select('agama', ['L' => 'Laki-laki', 'P' => 'Perempuan'], 'islam', ['class'=>'form-control']) !!} -->
              
              @if($petugas->petugascall->jenis_kelamin == 'L')
              <div class="radio">
                <label>
                  <input type="radio" name="jk" id="L" value="L" checked>
                  Laki-laki
                </label>
                <label>
                  <input type="radio" name="jk" id="P" value="P">
                 Perempuan
                </label>
              </div>
              @else
              <div class="radio">
                <label>
                  <input type="radio" name="jk" id="L" value="L" >
                  Laki-laki
                </label>
                <label>
                  <input type="radio" name="jk" id="P" value="P" checked>
                 Perempuan
                </label>
              </div>
              @endif
              {!! $errors->first('jk', '<p class="help-block">:message</p>') !!}
            </div>

        <!-- tempat lahir -->
        <div class="form-group {!! $errors->has('tempat_lahir') ? 'has-error' : '' !!}">
          {!! Form::label('tempat_lahir', 'Tempat Lahir *') !!}
          <input type="text" name="tempat_lahir" class="form-control" value="{{ $petugas->petugascall->tempat_lahir }}" />
          {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- tanggal lahir -->
        <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
          {!! Form::label('tanggal_lahir', 'Tanggal Lahir *') !!}
          {!! Form::date('tanggal_lahir', $petugas->petugascall->tanggal_lahir, ['class'=>'form-control']) !!}
          {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
        </div>

        <!-- alamat -->
        <div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
          {!! Form::label('alamat', 'Alamat *') !!}
          {!! Form::textarea('alamat', $petugas->petugascall->alamat, ['class'=>'form-control']) !!}
          {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
        </div>

        <!--  agama -->
        <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
          {!! Form::label('agama', 'Agama *') !!}
          {!! Form::select('agama', ['islam' => 'islam', 'kristen' => 'kristen', 'ketolik' => 'ketolik', 'hindu' => 'hindu', 'budha' => 'budha'], $petugas->petugascall->agama, ['class'=>'form-control']) !!}
          {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
        </div>
        
        <!-- no_hp -->
        <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
          {!! Form::label('no_hp', 'No Hp *') !!}
          {!! Form::number('no_hp', $petugas->petugascall->no_hp, ['class'=>'form-control']) !!}
          {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
        </div>
        
        <!-- foto -->
        <div class="form-group {!! $errors->has('foto_profile') ? 'has-error' : '' !!}">
          {!! Form::label('foto', 'foto') !!}
          {!! Form::file('foto', null, ['class'=>'form-control']) !!}
          {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
        </div>
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
      </div>
    </div>
    </div>
    </div>

</div> 

@endsection