@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
	<div class="col-12">
   <div class="card">
      <div class="card-body">
         <h2 class="card-title">Data Kategori</h2>
         <hr>
					<div ><a class="btn btn-round btn-primary" href="{{ route('kategori.create') }}">Tambah</a>
			  	</div>
			  
				<div class="table-responsive mt-10">
      <table id="datatable" class="table table-striped table-bordered">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($kategoris as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama }}</td>
<td>
	
	<form method="post" action="{{ route('kategori.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-round btn-danger">Delete</button>
		<a class="btn btn-round btn-warning" href="{{ route('kategori.edit',$data->id) }}">Edit</a>

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