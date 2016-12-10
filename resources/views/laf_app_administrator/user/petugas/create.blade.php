@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="row">
<div class="col-md-12">
<div class="isi-konten">
  <div class="panelprofile">
      <div class="panel panel-default ">
        <div class="panel-heading">
          <h3 class="panel-title">Tambah data petugas </h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            {!! Form::open(['route' => ['userpetugas.store'], 'enctype'=>'multipart/form-data'])!!}
            
            <div class="form-group {!! $errors->has('nama') ? 'has-error' : '' !!}">
              {!! Form::label('nama', 'Nama') !!}
              {!! Form::text('nama', null, ['class'=>'form-control']) !!}
              {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('username') ? 'has-error' : '' !!}">
              {!! Form::label('username', 'Username') !!}
              {!! Form::text('username', null, ['class'=>'form-control']) !!}
              {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
              {!! Form::label('email', 'Email') !!}
              {!! Form::text('email', null, ['class'=>'form-control']) !!}
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
              {!! Form::label('password', 'password') !!}
              <input name="password" type="password" class="form-control" placeholder="Masukkan password" value="gembiralokazoo">
              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
            </div>

            <!--  hidden petugas role -->
            <!-- {!! Form::hidden('role', 'petugas', ['class'=>'form-control']) !!} -->
              

            <!-- <div class="form-group {!! $errors->has('active') ? 'has-error' : '' !!}">
              {!! Form::label('active', 'Status blokir') !!}
              {!! Form::select('active', ['0' => 'Blokir', '1' => 'Active'], '1', ['class'=>'form-control']) !!}
              {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
            </div> -->

            <div class="form-group {!! $errors->has('no_hp') ? 'has-error' : '' !!}">
              {!! Form::label('no_hp', 'No Hp') !!}
              {!! Form::text('no_hp', null, ['class'=>'form-control']) !!}
              {!! $errors->first('no_hp', '<p class="help-block">:message</p>') !!}
            </div>
            <!--  -->

            <div class="form-group {!! $errors->has('jenis_kelamin') ? 'has-error' : '' !!}">
              {!! Form::label('jk', 'Jenis Kelamin') !!}
              <!-- {!! Form::select('agama', ['L' => 'Laki-laki', 'P' => 'Perempuan'], 'islam', ['class'=>'form-control']) !!} -->
              
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
              {!! $errors->first('jk', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('tempat_lahir') ? 'has-error' : '' !!}">
              {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
              {!! Form::text('tempat_lahir', null, ['class'=>'form-control']) !!}
              {!! $errors->first('tempat_lahir', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('tanggal_lahir') ? 'has-error' : '' !!}">
              {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!}
              {!! Form::date('tanggal_lahir', null, ['class'=>'form-control']) !!}
              {!! $errors->first('tanggal_lahir', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
              {!! Form::label('alamat', 'Alamat') !!}
              {!! Form::textarea('alamat', null, ['class'=>'form-control']) !!}
              {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('agama') ? 'has-error' : '' !!}">
              {!! Form::label('agama', 'Agama') !!}
             {!! Form::select('agama', ['islam' => 'islam', 'kristen' => 'kristen', 'ketolik' => 'ketolik', 'hindu' => 'hindu', 'budha' => 'budha'], 'islam', ['class'=>'form-control']) !!}
              {!! $errors->first('agama', '<p class="help-block">:message</p>') !!}
            </div>

            <div class="form-group {!! $errors->has('foto_profile') ? 'has-error' : '' !!}">
              {!! Form::label('foto', 'foto') !!}
              {!! Form::file('foto', null, ['class'=>'form-control']) !!}
              {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group">
              {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
              {!! Form::close() !!}
            </div>
            
      </div>
    </div>  
  </div>
  </div>
</div>
</div>
@endsection