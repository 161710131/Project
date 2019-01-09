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
			  	<form action="{{ route('konsumen.update',$konsumens->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
            <label class="control-label"><font style="color:grey">NIK</label> 
            <input type="number" name="nik" value="{{ $konsumens->nik }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="control-label"><font style="color:grey">Nama</label> 
            <input type="text" name="nama" value="{{ $konsumens->nama }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label class="control-label"><font style="color:grey">No HP</label> 
            <input type="text" name="nohp" value="{{ $konsumens->nohp }}" class="form-control number_only" required>
          </div>

          <div class="form-group">
            <label class="control-label"><font style="color:grey">Alamat</label> 
            <input type="text" name="alamat" value="{{ $konsumens->alamat }}" class="form-control" required>
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
