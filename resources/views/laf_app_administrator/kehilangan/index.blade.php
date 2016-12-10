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
            @include('laf_app_administrator.kehilangan._menuakses')
            <div class="panel-body">

            @include('flash::message')
            <div class="juduldetail">
            {!! Form::open(['url' => 'pengolahan/kehilangan', 'method'=>'get', 'class'=>'form-inline']) !!}
              <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control', 'placeholder' => 'Cari Nama']) !!}
                {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
              </div>

            
              {!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
            <br>
            <br>
              <h3 >Kehilangan Barang</h3>
              <hr>
              <!-- <h5 >Tampil data Kehilangan</h5> -->
            </div>
           
             <div class="col-md-12">
              
                <table class="table tablesetting">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>nama pemilik</th>
                      <th>tanggal</th>
                      <th>lokasi</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($kehilangans as $kehilangan)
                    <tr>
                      <td>{{ $kehilangan->id_proses }}</td>
                      
                      <td>{{ $kehilangan->nama }}</td>
                      <td>{{ $kehilangan->tanggal }}</td>
                      <td>{{ $kehilangan->lokasi }}</td>
                      <td><a href="{{ route('pengolahan.kehilangan.show', $kehilangan->id_proses)}}" class="btn btn-info ">Detail</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            <div class="paginate">
              {!! $kehilangans->links() !!}
            </div>
              </div>
          </div>
          </div>
        </div>
  </div>
</div> 

@endsection
       
   