@extends('layouts.app_laf')
@section('content')
<div class="container">
	<div class="row habis-header">
		<div class="col-md-3">
		@include('sidebar.sidebar')
		</div>
		<div class="col-md-9">
        	<div class="row">
          		<div class="col-md-12">
		            <ol class="breadcrumb">
					     <li>Penemuan -- Kategori: <a href="#">Semua</a></li>
						 <span class="pull-right">Lihat penemuan:
						  <a href="{{ url('penemuan?status=diambil') }}" class="btn btn-default btn-xs
						    ">diambil</a> |
						  <a href="{{ url('penemuan?status=belum diambil') }}" class="btn btn-default btn-xs
						    ">belum diambil</a>
						   <a href="#filter" class="btn btn-info btn-xs" data-toggle="collapse" aria-expanded="false" >Filter</a>
						</span>
					</ol>
          		</div>
          		<div class="col-md-12">
          			<!-- collapse dari link filer -->
          			<div class="collapse" id="filter">
					 	@include('laf_app.penemuan._filter')
					</div>
          		</div>
	            @foreach($penemuans as $p)
                <div class="col-md-6">
	              <h3>{{$p->nama_barang}}</h3>
					<div class="thumbnail bingkaigambar">
					  <img src="{{ url('images/fotobarang/'.$p->nama_foto) }}" class="img-rounded">
					  	<hr>
					    <div class="col-md-6">
					    	<p>pemilik: 
					    	@if(empty($p->nama_pemilik))
					    	-
					    	@else
					    	{{ $p->nama_pemilik }}
					    	@endif
					    	</p>
							<p>Status: <strong>{{ $p->status_pengambilan}}</strong></p>
					    </div>
					    <div class="col-md-6">
					    	<p>Kejadian: {{ $p->tanggal }}</p>
					    	<p>Kategori:
					            <span class="label label-primary"><i class="fa fa-btn fa-tags"></i>{{$p->nama_kategori}}</span>
						    </p>
					    </div>
					    <p class="keterangan"><a href="{{ route('penemuan.show', $p->id_penemuan)}}" class="btn btn-info ">Detail</a></p>

					</div>
	            </div>
	            @endforeach          
        </div>
        <div class="pull-right">
            <div class="paginate">
              {!! $penemuans->links() !!}
            </div>
        </div>
      </div>
	</div>
</div>

@include('home.footer')
@endsection