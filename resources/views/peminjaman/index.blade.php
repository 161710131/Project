@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-header">
        Peminjaman
        <div class="float-right">
          <a class="btn btn-xs btn-primary" href="{{route('peminjaman.create')}}"><i class="fa fa-file-plus"></i> Tambah</a>
        </div>
      </h2>
      <div class="card-body">
        <table id="myTable" class="table ">
          <thead class="thead-default">
            <tr>
              <th>No</th>
              <th>Nama Perental</th>
              <th>Barang Rentalan</th>
              <th>Jumlah Rental</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $nomor = 1; ?>
            @php $no = 1; @endphp
            @foreach($peminjamans as $data)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $data->Konsumen->nama }}</td>
              <td>{{ $data->Barang->nama }}</td>
              <td>{{ $data->jumlah_pinjam }}</td>
              <td>Rp.{{ number_format($data->Barang->harga) }},-</td>
              <td><a class="btn btn-xs btn-secondary" href="{{ route('peminjaman.show',$data->id) }}"><i class="fa fa-mood"></i> Lihat</a></td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection