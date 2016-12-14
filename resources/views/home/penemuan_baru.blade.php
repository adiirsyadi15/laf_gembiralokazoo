<section id="newfound">
<div class="container">
    <div class="col-md-12">
        <div class="judul">
            <h1 align="center">Penemuan Barang</h1>
        </div>
        <div class="well">
            <div class="bs-example">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="penemuanbaru">
                <div class="carousel-inner">
                <!-- deklarasi i untuk set active di class = "item active" -->
                <!-- yang aktif cuma item 1 -->
                <?php $i=1; ?>
                @foreach($penemuan_baru as $p)
                <div class="item <?php if($i==1){ echo "active"; } ?>  slidergambar">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ route('kehilangan.show', $p->id_penemuan) }}">
                            <img src="{{ url('images/fotobarang/'.$p->nama_foto) }}" alt="Image" class="img-responsive">
                        </a>
                      
                        <div class="caption"><p>Nama : {{ $p->nama_barang }}</p></div>
                            <div class="caption">
                                <p>kategori : <span class="label label-primary"> 
                                    <i class="fa fa-btn fa-tags"></i> {{ $p->nama_kategori }}</span>
                                </p>
                            </div>
                        <div class="caption"><p>Status : {{ $p->status_pengambilan }}</p></div>
                  </div>
                </div>
                <?php $i++ ?>
                @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left" href="#penemuanbaru" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="carousel-control right" href="#penemuanbaru" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>   
        </div>
    </div>
</div>
</section>
