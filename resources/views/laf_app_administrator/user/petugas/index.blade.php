@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="row">
   <div class="isi-konten">
      <div class="panelprofile">
        <div class="panel panel-default ">
        <div class="panel-heading">
          <h3 class="panel-title">PROFILE </h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            @include('flash::message')
            {!! Form::open(['url' => 'userpetugas', 'method'=>'get', 'class'=>'form-inline']) !!}
              <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Cari User berdasar nama']) !!}
                {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
              </div>
                <a href="{{ route('userpetugas.create') }}" class="glyphicon glyphicon-plus btn btn-success pull-right"></a>
              {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
                
            <table class="table table-striped tableuser">
              <thead>
                <tr>
                  <td>id</td>
                  <td>Username</td>
                  <td>Nama</td>
                  <td>HP</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                @foreach($petugas as $p)
                <tr>
                  <td> <p> {{ $p->id_petugas }} </p></td>
                  <td><a href="{{ route('userpetugas.show', $p->username)}}"><p> {{ $p->username }}</p></a></td>
                  <td><p> {{ $p->nama }}</p></td>
                  <td><p> {{ $p->no_hp }}</p></td>
                  <td><p> 
                    <a href="{{ route('userpetugas.edit', $p->username)}}"><span class="glyphicon glyphicon-edit"></span></a> 
                    |<a href="{{ route('userpetugas.show', $p->username)}}"><span class="glyphicon glyphicon-check"></span></a> 
                    |
                    <!-- Button trigger modal -->
                    <button type="button" data-toggle="modal" data-target="#myModal{{ $p->username }}">
                      <span class="glyphicon glyphicon-trash"></span>
                    </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{ $p->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Delete Data Petugas</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure about this <b>{{ $p->nama }}</b>?</p>
                              </div>
                              <div class="modal-footer">
                              {!! Form::model($petugas, ['route' => ['userpetugas.destroy', $p->username], 'method' => 'delete', 'class' => 'form-inline','id' => 'FormDeleteTime']  ) !!}
                                {!! Form::submit('delete', ['class'=>'btn  btn-danger js-submit-confirm']) !!}
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               {!! Form::close()!!}
                              </div>
                            </div>
                          </div>
                        </div>
                   </p></td>
                </tr>
                @endforeach
              </tbody>
            </table>
              <div class="paginate">
                {!! $petugas->links() !!}
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
</div> 

@endsection
       
   