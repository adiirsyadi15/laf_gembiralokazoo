
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cari Barang</h3>
  </div>
  <div class="panel-body">
    <form method="GET" action="" accept-charset="UTF-8">
        <div class="form-group ">
          <label for="q">Apa yang kamu cari?</label>
          <input class="form-control" name="q" type="text" id="q">
        </div>
      <input class="btn btn-primary" type="submit" value="Cari">
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Lihat per kategori</h3>
  </div>
  <div class="list-group">
    <a href="{{ url('kehilangan') }}" class="list-group-item">Semua Barang</a>
    @foreach($kategoris_sidebar as $s)
    <a href="{{ url('kehilangan?cat='.$s->id_kategori) }}" class="list-group-item">{{ $s->nama }}</a>
    @endforeach
          
      </div>
</div>


@include('sidebar.sidebar_kehilangan_penemuan_baru')
        