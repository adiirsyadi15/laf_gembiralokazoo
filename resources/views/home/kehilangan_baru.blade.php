<section id="newlost">
    <div class="container">
    <div class="col-md-12">
        <div class="judul">
            <h1 class="typojudul" align="center">Kehilangan Barang</h1>
        </div>
        <div class="well">
            <div class="bs-example">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                    <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                <!-- deklarasi i untuk set active di class = "item active" -->
                <!-- yang aktif cuma item 1 -->
                <?php $i=1; ?>
                @foreach($kehilangan_baru as $k)
                <div class="item <?php if($i==1){ echo "active"; } ?>  slidergambar">
                  <div class="col-md-3 col-sm-6 col-xs-12"><a href="{{ route('kehilangan.show', $k->id_kehilangan) }}">
                      <img src="{{ url('images/fotobarang/'.$k->nama_foto) }}" alt="Image" class="img-responsive"></a>
                      
                      <div class="caption"><p>Nama : {{ $k->nama_barang }}</p></div>
                      <div class="caption"><p>kategori : <span class="label label-primary"> <i class="fa fa-btn fa-tags"></i> {{ $k->nama_kategori }}</span></p></div>
                      <div class="caption"><p>Status : {{ $k->status_kehilangan }}</p></div>
                  </div>
                </div>
                <?php $i++ ?>
                @endforeach
                    </div>
                    <!-- Carousel controls -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>   
        </div>
    </div>
</div>
</section>
