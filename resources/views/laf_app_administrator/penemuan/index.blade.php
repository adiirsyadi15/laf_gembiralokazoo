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
        <div class="panel-body">
        <div class="row">
          <div class="col-md-3">
            @include('laf_app_administrator.penemuan._tambahpenemuan')
          </div>
          <div class="col-md-9">
            @include('laf_app_administrator.penemuan._filter')
          </div>
        </div>

        @include('flash::message')
        <div class="juduldetail">
        
        <br>
        <br>
          <h3 >Penemuan Barang</h3>
          <hr>
        </div>
       
         <div class="col-md-12">
          
            <table class="table tablesetting">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama Pemilik</th>
                  <th>Tanggal</th>
                  <th>Lokasi</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($penemuans as $p)
                <tr>
                  <td>{{ $p->id_proses }}</td>
                  <td>
                  @if(!empty($p->nama))
                    {{ $p->nama }}
                  @else
                    {{ "-" }}
                  @endif
                  </td>
                  <td>{{ $p->tanggal }}</td>
                  <td>{{ $p->lokasi }}</td>
                  <td><a href="{{ route('pengolahan.penemuan.show', $p->id_proses)}}" class="btn btn-info ">Detail</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        <div class="paginate">
          {!! $penemuans->links() !!}
        </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div> 

@endsection
       
   