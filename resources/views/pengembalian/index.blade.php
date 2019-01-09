@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-header">
        Pengembalian
        
      </h2>
      <div class="card-body">
        <table id="myTable" class="table table-striped table-bordered">
          <thead class="thead-default" >
            <tr>
              <th>No</th>
              <th>Nama Peminjam</th>
              <th>Barang Pinjaman</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Batas Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Harga</th>
              <th>Denda</th>
              <th>Keterangan</th>
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
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
