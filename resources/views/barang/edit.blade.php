@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data  
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('barang.update',$barangs->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
                    
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Barang</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $barangs->nama }}" required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

                      <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
			  			<label class="control-label">Stock</label>	
			  			<input type="text" value="{{ $barangs->stock }}" name="stock" class="form-control"  required>
			  			@if ($errors->has('stock'))
                            <span class="help-block">
                                <strong>{{ $errors->first('stock') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('harga') ? ' has-error' : '' }}">
			  			<label class="control-label">Harga</label>	
			  			<input type="text" value="{{ $barangs->harga }}" name="harga" class="form-control"  required>
			  			@if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('denda') ? ' has-error' : '' }}">
			  			<label class="control-label">Denda</label>	
			  			<input type="text" value="{{ $barangs->denda }}" name="denda" class="form-control"  required>
			  			@if ($errors->has('denda'))
                            <span class="help-block">
                                <strong>{{ $errors->first('denda') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="form-group {{ $errors->has('desc') ? ' has-error' : '' }}">
			  			<label class="control-label">Deskripsi</label>	
			  			<input type="text" value="{{ $barangs->desc }}" name="desc" class="form-control"  required>
			  			@if ($errors->has('desc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('desc') }}</strong>
                            </span>
                        @endif
                      </div>

                    <div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label">Gambar</label>
						  <p>	
						  <br>
						  <img src="{{ asset('/backend/images/gambarbarang/'.$barangs->gambar) }}" style="max-height:125px;max-width:125px;margin-top:7px"></td>
						  </p>
			  			<input type="file" id="gambar" name="gambar" class="validate" accept="image/*" value="{{ $barangs->gambar }}"  required>
			  			@if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>
                        @endif
			  		</div>
                      
					<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Kategori</label>	
			  			<select name="kategori_id" class="form-control">
			  				@foreach($kategori as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKategori == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategori_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection