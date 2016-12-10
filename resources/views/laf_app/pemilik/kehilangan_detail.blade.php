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
        <div class="profile pemilik_kehilangan">
          <h4>Detail Kehilangan
            @foreach($kehilangans as $k)
              <?php $id_proses = $k->id_proses ?>
            @endforeach
              <a href="{{ route('pemilik.kehilangan.cetak', [$username, $id_proses]) }}" data-toggle="tooltip" data-placement="left" title="cetak laporan" target="_blank">
              <span class="glyphicon glyphicon-print" ></span>
              </a>
          </h4>
          <hr>
          
          @include('flash::message')
          @foreach($kehilangans as $k)
            <h5>Data Kejadian
            <a href="{{ route('pemilik.kehilangan.editkejadian', [$username, $id_proses]) }}" data-toggle="tooltip" data-placement="left" title="edit kejadian">
              <span class="glyphicon glyphicon-edit"></span>
              </a>
            </h5>
            <hr>
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label">hari</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $k->hari }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">tanggal</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $k->tanggal }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">waktu</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $k->waktu }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">lokasi</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $k->lokasi }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">keterangan</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $k->keterangan }}</p>
                </div>
              </div>
            </form>
          @endforeach

      <h5 > Data Barang <a href="{{ route('pemilik.barang.tambah', [$username, $id_proses]) }}"  data-toggle="tooltip" data-placement="left" title="tambah barang"><span class="glyphicon glyphicon-plus"></span></a></h5>
      <hr>
      @foreach($barangs as $b)
      
      <div class="well">
        <div class="row">
          <div class="col-md-4">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            
              <div class="item active">
                <!-- <img src="" > -->
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            </div>
          </div>

          <div class="col-md-8">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-2 control-label">nama</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $b->nama_barang }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">kategori</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $b->kategori }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Ciri - ciri</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $b->ciri_ciri }}</p>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Status Kehilangan</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $b->status_kehilangan }}</p>
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>

      @endforeach
        </div>
      </div>

    </div>
  </div>
  
</div>


@include('home.footer')
@endsection