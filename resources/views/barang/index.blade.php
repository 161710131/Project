@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
	<div class="col-12">
   <div class="card">
      <div class="card-body">
         <h2 class="card-title">Data Barang</h2>
         <hr>
			<a class="btn btn-round btn-primary" href="{{ route('barang.create') }}">Tambah</a>
			  
			  <div class="table-responsive mt-10">
      <table id="datatable" class="table table-striped table-bordered">
				  	<thead>
			  		<tr>
                      <th>No</th>
					  <th>Nama</th>
                      <th>Stock</th>
                      <th>Harga</th>
                      <th>Denda</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Kategori</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($barangs as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama }}</td>
                        <td>{{ $data->stock }}</td>
                        <td>Rp.{{ number_format($data->harga) }},-</td>
                        <td>Rp.{{ number_format($data->denda) }},-</td>
                        <td>{{ $data->desc }}</td>
                        <td><img src="{{ asset('/backend/images/gambarbarang/'.$data->gambar) }}" style="max-height:125px;max-width:125px;margin-top:7px"></td>
				    	<td>{{ $data->Kategori->nama }}</td>
						<td>
							
						
							<form method="post" action="{{ route('barang.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-round btn-danger">Delete</button>
								<a class="btn btn-round btn-warning" href="{{ route('barang.edit',$data->id) }}">Edit</a>
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