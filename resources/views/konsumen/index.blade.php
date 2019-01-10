@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
	<div class="col-12">
   <div class="card">
      <div class="card-body">
         <h2 class="card-title">Data Konsumen</h2>
         <hr>
				<a class="btn btn-round btn-primary" href="{{ route('konsumen.create') }}">Tambah</a>
			  	
			</h2>
			  </div>
			  <div class="panel-body">
			  	 <div class="table-responsive mt-10">
      <table id="datatable" class="table table-striped table-bordered">
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

	<form method="post" action="{{ route('konsumen.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-round btn-danger">Delete</button>
			<a class="btn btn-round btn-warning" href="{{ route('konsumen.edit',$data->id) }}">Edit</a>
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