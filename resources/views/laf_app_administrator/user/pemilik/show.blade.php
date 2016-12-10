@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="panel panel-default ">
  <div class="row">
    <div class="panel-body"> 
      <div class="isi-konten">
      
      @foreach($pemiliks as $p)
      <div class="datapemilik">
        <h4>Data Pemilik
        <a href="{{ route('userpemilik.edit', $p->username)}}" ><span class="glyphicon glyphicon-edit"> Edit</span></a>
        @if($p->status_verifikasi == 1)
          <!-- tomboh verifikasi -->
          <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ver{{ $p->username }}" rel="tooltip" data-original-title='verifikasi pemilik' data-placement="right">Verifikasi</button>
        @else

        <!-- verifikasi -->
        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ver{{ $p->username }}" rel="tooltip" data-original-title='verifikasi pemilik' data-placement="right">Belum tererifikasi</button>
        <!-- Modal verifikasi -->
        <div class="modal fade" id="ver{{ $p->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Verifikasi data pemilik</h4>
              </div>
              <div class="modal-body">
                <p> Apakah <bold> {{ $p->username }} </bold> akan diverifikasi ? </p>
                <ol>
                  <li>data pemilik harus telah diisi semua</li>
                  <li>data pemilik harus valid sesuai dengan identitas</li>
                  <li>lampiran identitas minimal 2</li>
                </ol>

                {!! Form::open(['route' => ['userpemilik.verifikasi', $p->username], 'method' =>'post' ])!!}
                <input type="hidden" name="verifikasi" value="{{  $p->status_verifikasi }}">
              </div>
              <div class="modal-footer">
                {!! Form::submit('Ya', ['class'=>'btn btn-primary']); !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
        @endif

        </h4>
        <hr>
        @include('flash::message')
        <div class="col-sm-6 col-md-3">
          <div class="thumbnail ">
            <img src="{{ url('images/fotoprofile/'.$p->foto_profile) }}"  class="img-rounded fotoadmin" alt="Generic placeholder thumbnail">
            <div class="caption">
                <!-- <button type="button" class="btn btn-success pull-rigth">EDIT FOTO</button> -->
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <form class="form-horizontal">
            <div class="form-group adminprofilelabel">
              <h5 class="adminprofilelabel"><b>Informai Umum</b></h5>

              <!-- usernmae -->
              <label class="col-md-2 control-label">Username</label>
              <div class="col-md-10">
                <p class="form-control-static">{{ $p->username }}</p>
              </div>

              <!-- nama -->
              <div class="row">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                <p class="form-control-static">{{ $p->nama }}</p>
                </div>
              </div>

              <!-- alamat -->
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
              <p class="form-control-static">{{ $p->alamat }}</p>
              </div>

              <!-- Pekerjaan -->
              <label class="col-sm-2 control-label">Pekerjaan</label>
              <div class="col-sm-10">
              <p class="form-control-static">{{ $p->pekerjaan }}</p>
              </div>

              <!-- jenis kelamin -->
              <div class="row">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                @if($p->jenis_kelamin == 'L')
                <p class="form-control-static">
                  laki-laki
                </p>
                @else
                <p class="form-control-static">
                  Perempuan
                </p>
                @endif
                </div>
              </div>

              <!-- tempat tanggal lahir -->
              <div class="row">
                <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $p->tempat_lahir }}, {{ $p->tanggal_lahir }}</p>
                </div>
              </div>

              
              <!-- agama -->
              <div class="row">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $p->agama }}</p>
                </div>
              </div>

              <!-- user akses -->
              <div class="row">
                <label class="col-md-2 control-label">user akses</label>
                <div class="col-md-10">
                  <p class="form-control-static">
                      @if ($p->active == "1")
                          <span class="btn btn-success btn-xs" >{{ "Aktif" }}</span>
                      @else
                          <span class="btn btn-danger btn-xs">{{ "tidak Aktif" }}</span>
                        @endif
                  </p>
                </div>
              </div>

              <!-- status verifikasi -->
              <div class="row">
                <label class="col-md-2 control-label">Status Verifikasi</label>
                <div class="col-md-10">
                  <p class="form-control-static">
                      @if ($p->status_verifikasi == "1")
                          <span class="btn btn-primary btn-xs glyphicon glyphicon-ok" ></span>
                      @else
                          <span class="btn btn-danger btn-xs glyphicon glyphicon-remove" ></span>
                        @endif
                  </p> <br/>
                </div>
              </div>
              
               <br/>
              <h5><b>Informai Kontak</b></h5>
              <div class="row">
                <label class="col-sm-2 control-label">Alamat Email</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $p->email }}</p>
                </div>
              </div>
              
              <div class="row">
                <label class="col-sm-2 control-label">Nomor hp</label>
                <div class="col-sm-10">
                  <p class="form-control-static">{{ $p->no_hp }}
                  @if($p->whatsapp == 1)
                  <img src="{{ url('images/icon/icon_whatsapp.png') }}" class="gambaricon" data-toggle="tooltip" data-placement="right" title="dapat di hubungi lewat whatsapp">
                  @endif
                  </p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 control-label">Pin BBM</label>
                <div class="col-sm-10">
                  <p class="form-control-static">
                  @if(!empty($p->pin_bbm))
                    {{ $p->pin_bbm }}
                  @else
                    {{ "-" }}
                  @endif
                  </p>
                </div>
              </div>
              <div class="row">
                <label class="col-sm-2 control-label">line</label>
                <div class="col-sm-10">
                  <p class="form-control-static">
                  @if(!empty($p->pin_bbm))
                    {{ $p->line }}
                  @else
                    {{ "-" }}
                  @endif
                  </p>
                </div>
              </div>
              
            </div>
          </form>
      </div>
      </div>
      @endforeach
    </div>
    </div>
  </div> 
  <div class="row">
    <div class="panel-body"> 
      <div class="isi-konten"> 
      <div class="datapemilik">

      <h4> Lampiran Identitas Pemilik Barang <a data-toggle="modal" data-target="#identitas{{ $p->username }}"><span class="glyphicon glyphicon-plus"> Tambah</span></a></h4>

      </div>

      <!-- Button trigger modal -->
      <!-- <button type="button" data-toggle="modal" data-target="#identitas{{ $p->username }}">
        <span class="glyphicon glyphicon-trash"></span>
      </button> -->

          <!-- Modal tambah identitas -->
          <div class="modal fade" id="identitas{{ $p->username }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Tambah Data Identitas</h4>
                </div>
                {!! Form::open(['route' => ['identitas.store'], 'enctype'=>'multipart/form-data'])!!}


                <div class="modal-body">
                      <input type="hidden" name="id_pemilik" value="{{ $p->id_pemilik }}">
                      <input type="hidden" name="username" value="{{ $p->username }}">
                      <div class="form-group  {!! $errors->has('nomor') ? 'has-error' : '' !!}">
                          <div class="form-group">
                              <label for="nomor">nomor</label>
                              {!! Form::text('nomor', null, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
                          </div>
                          {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
                      </div>
                      @include('laf_app_administrator.user.pemilik._formidentitas') 
                </div>
                <div class="modal-footer">
                
                  <input type="submit" name="submit" class="submit btn btn-success" value="Submit" />
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 {!! Form::close()!!}
                </div>
              </div>
            </div>
          </div>


      @if($identitas->isEmpty())
        <p>data kosong</p>
      @else
            <ul class="nav nav-tabs">
              @foreach($identitas as $id)
              <li><a href="#{{ $id->jenis_identitas }}">{{ $id->jenis_identitas }}</a></li>
               @endforeach
            </ul>
            
             
            <div class="tab-content">
              @foreach($identitas as $id)
              <div id="{{ $id->jenis_identitas }}" class="tab-pane fade in fade">
                <div class="media">
                  <div class="media-left media-top">
                    <a href="#" data-toggle="modal" data-target="#lightbox">
                      <img src="{{ url('images/identitas/'.$id->gambar) }}"  class="media-object" alt="foto">
                    </a>
                  </div>
                  <div class="media-body">
                    <!-- <h4 class="media-heading">Media Top</h4> -->
                    <p>kategori : {{ $id->jenis_identitas }}</p>
                    <p>Nomor identitas : {{ $id->nomor_identitas }}</p>
                    <p><a data-toggle="modal" data-target="#identitas_rubah{{ $id->jenis_identitas }}"><span class="glyphicon glyphicon-plus"> rubah identitas</span></a></p>
                      <!-- Modal tambah identitas -->
                        <div class="modal fade" id="identitas_rubah{{ $id->jenis_identitas }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Rubah data Identitas</h4>
                              </div>
                              {!! Form::model($identitas, ['route' => ['identitas.update', $id->id_identitas], 'method' => 'put', 'enctype'=>'multipart/form-data']  ) !!}
                              <div class="modal-body">
                                    <input type="hidden" name="username" value="{{ $p->username }}">
                                     <input type="hidden" name="id_pemilik" value="{{ $p->id_pemilik }}">
                                    <div class="form-group  {!! $errors->has('nomor') ? 'has-error' : '' !!}">
                                      <div class="form-group">
                                          <label for="nomor">nomor</label>
                                          {!! Form::text('nomor', $id->nomor_identitas, ['class'=>'form-control', 'placeholder'=>'masukkan nomor']) !!}
                                      </div>
                                      {!! $errors->first('nomor', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    @include('laf_app_administrator.user.pemilik._formidentitas') 
                              </div>
                              <div class="modal-footer">
                                <input type="submit" name="submit" class="submit btn btn-success" value="Simpan" />
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                               {!! Form::close()!!}
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- modals image box atau lihat gambar -->
                       <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <img src="" alt="" />
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                </div>
              </div>

              @endforeach
            </div>
      @endif
      <!-- @if(!empty($identitas)) -->
          
          
      <!-- @endif -->
        
      </div>
    </div>
  </div>
</div>
@endsection
       
   