@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-header">
        Pengembalian
        
      </h2>
      <div class="card-body">
      <div class="table-responsive mt-10">
      <table id="datatable" class="table table-striped table-bordered">
          <thead class="thead-default" >
            <tr>
              <th>No</th>
              <th>Nama Perental</th>
              <th>Barang Rental</th>
              <th>Jumlah Rental</th>
              <th>Tanggal Rental</th>
              <th>Tanggal Batas Rental</th>
              <th>Tanggal Kembali</th>
              <th>Harga</th>
              <th>Denda</th>
              <th>Keterangan</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor = 1; ?>
            @php $no = 1; @endphp
            @foreach($pengembalians as $data)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $data->Konsumen->nama}}</td>
              <td>{{ $data->Barang->nama }}</td>
              <td>{{ $data->jumlah_pinjam }}</td>
              <td>{{ $data->tanggal_pinjam }}</td>
              <td>{{ $data->tanggal_batas }}</td>
              <td>{{ $data->tanggal_kembali }}</td>
              <td>Rp.{{ number_format($data->Barang->harga) }},-</td>
              <td>Rp.{{ number_format($data->denda) }},-</td>
              <td>{{ $data->keterangan }}</td>
              <td><a class="btn btn-round btn-info" href="#"><i class="fa fa-mood"></i> Cetak</a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
