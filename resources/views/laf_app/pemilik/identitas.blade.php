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
    <h4>Lampiran Identitas
    @if($identitas->isEmpty())
     <a href="{{ route('pemilik.identitas.tambah', $pemiliks->username) }}" data-toggle="tooltip" data-placement="left" title="Tambah Identitas"><span class="glyphicon glyphicon-plus"></span></a>
    @else
      <a href="{{  route('pemilik.identitas.edit',  $pemiliks->username) }}" data-toggle="tooltip" data-placement="left" title="Edit Identitas"><span class="glyphicon glyphicon-edit"></span></a>
    @endif
   
    </h4>
     <hr>
        <div class="formsetting">
          <?php $j=1 ?>
          @if($identitas->isEmpty())
            <p>data kosong</p>
          @else

          @foreach($identitas as $i)
          <h5>Identitas <?php echo "$j";$j++; ?></h5>
          <hr>
          <div class="media">
            <div class="col-md-5">
              <div class="media-left">
                <div class="thumbnail ">
                  <a href="#" id="link1" data-toggle="modal" data-target="#ModalImage">
                    <img class="media-object " id="img" src="{{ url('images/identitas/'.$i->gambar) }}" alt="{{ $i->gambar }}">
                  </a>
                <div class="caption">
                </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="media-body">
                 <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $i->jenis_identitas}}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $i->nomor_identitas }}</p>
              </div>
            </div>

          </form>
              </div>
            </div>
          </div>
          @endforeach
          @endif
          <!-- modal image Identitas -->
          <div class="modal fade" id="ModalImage" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="showImg">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection