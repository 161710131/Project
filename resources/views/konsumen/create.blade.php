@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="card-body">
          <form action="{{ route('konsumen.store') }}" method="post">
          {{csrf_field()}}
            <div class="form-group">
              <label class="control-label"><font style="color:grey">NIK</label> 
              <input type="number" name="nik" class="form-control" required>
            </div>

            <div class="form-group">
              <label class="control-label"><font style="color:grey">Nama</label> 
              <input type="text" name="nama" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label class="control-label"><font style="color:grey">No HP</label> 
              <input type="text" name="nohp" class="form-control number_only" required>
            </div>

            <div class="form-group">
              <label class="control-label"><font style="color:grey">Alamat</label>
              <textarea class="form-control editor" name="alamat" required></textarea> 
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-xs btn-primary"><i class="zmdi zmdi-save"></i> Simpan</button>
            </div>
            </form>
          </div>
			</div>	
		</div>
	</div>
</div>
@endsection    