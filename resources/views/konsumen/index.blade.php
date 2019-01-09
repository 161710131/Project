@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<h2 class="card-header">
        Data Kategori
				<div class="float-right"><a class="btn btn-xs btn-primary" href="{{ route('konsumen.create') }}">Tambah</a>
			  	</div>
			</h2>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
              <th>NIK</th>
              <th>Nama </th>
              <th>No HP</th>
              <th>Alamat</th>
              <!-- <th>Menjadi konsumen Sejak</th> -->
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($konsumens as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
              <td>{{ $data->nik }}</td>
              <td>{{ $data->nama}}</td>
              <td>{{ $data->nohp }}</td>
              <td>{{ $data->alamat }}</td>
              <!-- <td>{{ $data->created_at }}</td> -->
<td>
	<a class="btn btn-warning" href="{{ route('konsumen.edit',$data->id) }}">Edit</a>
</td>
<td>
	<form method="post" action="{{ route('konsumen.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection