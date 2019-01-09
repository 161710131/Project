@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			<h2 class="card-header">Data Barang
					<div class="float-right"><a class="btn btn-xs btn-primary" href="{{ route('barang.create') }}">Tambah</a>
			  	</div>
			</h2>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
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
							<a class="btn btn-warning" href="{{ route('barang.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<form method="post" action="{{ route('barang.destroy',$data->id) }}">
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