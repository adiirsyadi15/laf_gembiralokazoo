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
    <h4>Data Pribadi
      @if($pemiliks->status_verifikasi == 1)
        <small  class="glyphicon glyphicon-check green" data-toggle="tooltip" data-placement="bottom" title="terverifikasi"></small>
      @else
        <small >Belum Terverifikasi</small>
      @endif
      <a href="{{ route('pemilik.edit', $pemiliks->username) }}" data-toggle="tooltip" data-placement="left" title="Edit data pemilik"><span class="glyphicon glyphicon-edit"></span></a>
    </h4>
     <hr>
        @include('flash::message')
      <div class="col-sm-6 col-md-4">
      <a href="#" data-toggle="modal" data-target="#ModalFotoProfile">
        <div class="thumbnail ">
            <img src="{{ url('images/fotoprofile/'.$pemiliks->foto_profile) }}"  class="img-rounded" alt="Generic placeholder thumbnail">
            <div class="caption">
            </div>
          </div>
      </a>
          
        </div>
        <div class="col-md-8 formsetting">
          <h5>Informasi Umum</h5>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label ">Username</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->username }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->nama }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                @if($pemiliks->jenis_kelamin == 'L')
                <p class="form-control-static">
                  laki-laki
                </p>
                @elseif($pemiliks->jenis_kelamin == 'P')
                <p class="form-control-static">
                  Perempuan
                </p>
                @else
                  <p class="form-control-static">
                </p>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->tempat_lahir }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->tanggal_lahir }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->agama }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->alamat }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pekerjaan</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->pekerjaan }}</p>
              </div>
            </div>

          </form>
          <br><br>

          <h5>Informasi Kontak</h5>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->usercall->email }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor Hp</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->no_hp }}
                @if($pemiliks->whatsapp == 1)
                  <img src="{{ url('images/icon/icon_whatsapp.png') }}" class="gambaricon" data-toggle="tooltip" data-placement="right" title="dapat di hubungi lewat whatsapp">
                  
                @endif
                </p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Pin BBM</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->pin_bbm }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Line</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $pemiliks->line }}</p>
              </div>
            </div>
          </form>
        </div>


    <!-- modal foto profile -->
    <div class="modal fade" id="ModalFotoProfile" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" id="showImg">
          </div>
        </div>
      </div>
    </div>
    <!-- tutup modal foto profile -->
    
    </div>
  </div>
  
</div>
</div>
  
</div>


@include('home.footer')
@endsection