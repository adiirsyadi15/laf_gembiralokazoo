@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="isi-konten">
    <div class="row">
      <h3>PENEMUAN
          <a href="#" data-toggle="tooltip" data-placement="left" title="cetak laporan" target="_blank" class="pull-right"><span class="glyphicon glyphicon-print" ></span></a>
      </h3>

      <br>
      <div class="col-md-6">
        <div class="datapemilik">
          @if($pemiliks == "kosong")
            <h4>Data Pemilik
              <a href="#" data-toggle="tooltip" data-placement="left" title="Tambah Data Pemilik"><span class="glyphicon glyphicon-plus"  class="pull-left"></span> Pemilik</a>
            </h4> <hr>
            <p>Belum ada Data Pemilik</p>
          @else
          <h4>Data Pemilik <a href="{{ url('userpemilik/'.$pemiliks->username) }}" class="pull-right">Detail</a></h4>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->nama }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis kelamin</label>
              <div class="col-sm-10">
                @if($pemiliks->jenis_kelamin == 'L')
                  <p class="form-control-static">Laki-laki</p>
                @else
                  <p class="form-control-static">Perempuan</p>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Umur</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $umur }} tahun</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->alamat }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor hp</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->no_hp }}
                @if($pemiliks->whatsapp == 1)
                   <img src="{{ url('images/icon/icon_whatsapp.png') }}" class="gambaricon" data-toggle="tooltip" data-placement="right" title="dapat di hubungi lewat whatsapp">
                @endif
                </p>
              </div>
            </div>
          </form>
          @endif
        </div>
      </div>

      @foreach($penemuans as $p)
      <div class="col-md-6">
        <div class="datapemilik">
          <h4>Data Kejadian
          <a href="{{ route('pengolahan.penemuan.editkejadian', [$id_proses, $p->id_kejadian]) }}" class="pull-right">edit</a>
          </h4>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">hari</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $p->hari }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">tanggal</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $p->tanggal }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">waktu</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $p->waktu }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">lokasi</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $p->lokasi }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">keterangan</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $p->keterangan }}</p>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endforeach
    </div>
      
    <div class="row">
    <div class="datapemilik">
      <h4>Data Barang <a href="{{ route('pengolahan.penemuan.tambah_barang', $id_proses) }}" class="pull-right">Tambah</a></h4>
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
            <!--  -->

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
          <div class="col-md-6">
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
                <label class="col-sm-2 control-label">Status penemuan</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $b->status_pengambilan }}</p>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2">
            <form class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12 control-label">
                <a href="{{ route('pengolahan.kehilangan.edit_barang', [$id_proses,$b->id_barang]) }}">ubah</a>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12 control-label">
                <a href="#">Delete</a>
                </div>
              </div>


            </form>
          </div>
          
        </div>
      </div>
    @endforeach
    <div class="col-md-4">

    </div>
    </div>
     
    </div>
</div>

@endsection
       
   