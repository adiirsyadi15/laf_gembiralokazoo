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
          <h4>Kehilangan
             <a href="{{ route('pemilik.kehilangan.tambah', $username) }}" data-toggle="tooltip" data-placement="left" title="Tambah Laporan Kehilagnan"><span class="glyphicon glyphicon-plus"></span></a>
          </h4>
          @include('flash::message')
          <div class="col-md-12">
              @if($kehilangans->isEmpty())
                <p>Belum ada Laporan Kehilangan</p>
              @else
                <table class="table tablesetting">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>tanggal</th>
                      <th>lokasi</th>
                      <th>keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($kehilangans as $kehilangan)
                    <tr>
                      <td>{{ $kehilangan->id_proses }}</td>
                      <td>{{ $kehilangan->tanggal }}</td>
                      <td>{{ $kehilangan->lokasi }}</td>
                      <td>{{ $kehilangan->keterangan }}</td>
                      <td><a href="{{ route('pemilik.kehilangan.detail', [$username ,$kehilangan->id_proses])}}" class="btn btn-danger ">Detail</a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
              </div>
            <div class="paginate">
              {!! $kehilangans->links() !!}
            </div>
        </div>
      </div>

    </div>
  </div>
  
</div>


<!-- @include('home.footer') -->
@endsection