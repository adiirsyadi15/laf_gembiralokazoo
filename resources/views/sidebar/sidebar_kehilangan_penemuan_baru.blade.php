<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#kehilangan_baru">Kehilangan</a></li>
  <li><a data-toggle="tab" href="#penemuan_baru">Penemuan</a></li>
</ul>

<div class="tab-content">
  <div id="kehilangan_baru" class="tab-pane fade in active">
      <div class="list-group gambarbarang">
    @foreach($kehilangan_sidebar as $k)
      <a href="{{ url('kehilangan/'.$k->id_kehilangan) }}" class="list-group-item">
      <div class="row">
        <div class="col-md-4">
          <img src="{{ url('images/fotobarang/'. $k->foto) }}">
        </div>
        <div class="col-md-8">
          <p>{{ $k->nama_barang }}  <span class="btn btn-info btn-xs pull-right">{{ $k->status_kehilangan }}</span></p>
          <p>{{ $k->nama_kategori }}</p>
        </div>
      </div>
    </a>
    @endforeach
    </div>
  </div>
  <div id="penemuan_baru" class="tab-pane fade">
    <div class="list-group gambarbarang">
    @foreach($penemuan_sidebar as $p)
      <a href="{{ url('penemuan/'.$p->id_penemuan) }}" class="list-group-item">
      <div class="row">
        <div class="col-md-4">
          <img src="{{ url('images/fotobarang/'. $p->foto) }}">
        </div>
        <div class="col-md-8">
          <p>{{ $p->nama_barang }}  <span class="btn btn-info btn-xs pull-right">{{ $p->status_pengambilan }}</span></p>
          <p>{{ $p->nama_kategori }}</p>
        </div>
      </div>
    </a>
    @endforeach
    </div>
  </div>
</div>