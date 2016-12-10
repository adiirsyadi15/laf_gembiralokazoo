<fieldset>
  <h4> Step 1: Tambah data Pemilik</h4>
   
    <div class="form-group  {!! $errors->has('id_pemilik') ? 'has-error' : '' !!}">
      <div class="form-group">
      <br>
          <label for="kategori">Nama Pemilik Barang</label>
           
          <select class="form-control" required name="id_pemilik"> 
              <option value="">------   masukkan data pemilik  -----------</option>
              <?php $i = 1; ?>
              @foreach($pemiliks as $p)
            
              <option value="{{ $p->id_pemilik }}">{{ $i }}{{ ". " }} {{  $p->nama }} ({{$p->username}}) </option> 
              <?php $i++; ?>
              @endforeach
          </select>
         
      </div>
      {!! $errors->first('id_pemilik', '<p class="help-block">:message</p>') !!}
  </div>
    

    <input type="button" name="next" class="next btn btn-info pull-right" value="Next" />
</fieldset>