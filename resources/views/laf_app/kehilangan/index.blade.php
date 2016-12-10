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
					     <li>Kehilangan -- Kategori: <a href="#">Semua</a></li>
						 <span class="pull-right">Lihat penemuan:
						  <a href="#" class="btn btn-default btn-xs
						    ">ditemukan</a> |
						  <a href="#" class="btn btn-default btn-xs
						    ">belum ditemukan</a>
						</span>
					</ol>
          		</div>

                
	            @foreach($kehilangans as $k)
                <div class="col-md-6">
	              <h3>{{$k->nama_barang}}</h3>
					<div class="thumbnail bingkaigambar">
					  <img src="{{ url('images/fotobarang/'.$k->nama_foto) }}" class="img-rounded">
					  	<hr>
					    <div class="col-md-6">
					    	<p>pemilik: {{ $k->nama_pemilik }}</p>
							<p>Status: <strong>{{ $k->status_kehilangan}}</strong></p>
					    </div>
					    <div class="col-md-6">
					    	<p>Kejadian: {{ $k->tanggal }}</p>
					    	<p>Kategori:
					            <span class="label label-primary"><i class="fa fa-btn fa-tags"></i>{{$k->nama_kategori}}</span>
						    </p>
					    </div>
					    <p class="keterangan"><a href="{{ route('kehilangan.show', $k->id_kehilangan)}}" class="btn btn-info ">Detail</a></p>

					</div>
	            </div>
	            @endforeach

                     
          
          
        </div>
        <div class="pull-right">
            <div class="paginate">
              {!! $kehilangans->links() !!}
            </div>
        </div>
      </div>
	</div>
</div>

@include('home.footer')
@endsection