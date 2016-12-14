{!! Form::open(['url' => 'kehilangan/filter', 'method'=>'post', 'class'=>'form-horizontal']) !!}
	<div class="col-md-6">
		<div class="form-group">
			<div class="col-xs-3">
				<label>Nama Barang</label>
			</div>
			<div class="col-xs-9">
				<input type="text" name="nb" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-3">
				<label>Nama Pemilik</label>
			</div>
			<div class="col-xs-9">
				<input type="text" name="np" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-3">
				<label>Nama Kategori</label>
			</div>
			<div class="col-xs-9">
				<select name="cat" class="form-control">
					<option value="">--- pilih kategori ---</option>
					<option value="ss">aaa</option>
					<option value="aksesoris">aksesoris</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<div class="col-xs-3">
				<label>Tanggal Kejadian</label>
			</div>
			<div class="col-xs-9">
				<input type="date" name="tgl" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-3">
				<label>Status</label>
			</div>
			<div class="col-xs-9">
				<select name="status" class="form-control">
					<option value="">--- pilih status ---</option>
					<option value="hilang">hilang</option>
					<option value="ditemukan">ditemukan</option>
				</select>
			</div>
		</div>
		{!! Form::submit('Cari', ['class'=>'btn btn-primary pull-right']) !!}
	</div>
{!! Form::close() !!}