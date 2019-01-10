@extends('layouts.admin')
@push('styles')
<style type="text/css">
  .table thead tr th{
  vertical-align: middle;
  text-align: center;
  }
  .table tbody tr td{
  vertical-align: middle;
  text-align: center;
  }
  #data th, #data td {
  font-size: 11px;
  }
  .text-danger 
  {
  text-transform:capitalize;
  }
  .fc-time{
  display: none;
  }
</style>
<style type="text/css"></style>
@endpush
@section('title')
Data Peminjaman
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-header">
        Lihat Peminjaman
    
      </h2>
      <div class="card-body">
        <form action="{{ route('peminjaman.update',$peminjamans->id) }}" method="post">
          <input name="_method" type="hidden" value="PATCH">
          {{csrf_field()}}
          <div class="form-group">
            <input type="hidden" name="konsumen_id" class="form-control" value="{{ $peminjamans->Konsumen->id }}"  readonly>
          </div>
          <div class="form-group">
            <input type="hidden" name="barang_id" class="form-control" value="{{ $peminjamans->Barang->id }}"  readonly>
          </div>
          <div class="form-group">
            <label class="control-label">Nama Perental</label>
            <select class="form-control" name="konsumen_id" disabled="">
              @foreach($konsumens as $data)
              <option value="{{$data->id}}" <?php if($peminjamans->konsumen_id==$data->id)
                echo "selected='selected'";?>>{{$data->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="control-label">Barang Rentalan</label>
            <select class="form-control" name="barang_id" disabled="">
              @foreach($barangs as $data)
              <option value="{{$data->id}}" <?php if($peminjamans->barang_id==$data->id)
                echo "selected='selected'";?>>{{$data->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="control-label"><font style="color:grey">Jumlah Rental</label> 
            <input type="number" name="jumlah_pinjam" value="{{ $peminjamans->jumlah_pinjam }}" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label class="control-label"><font style="color:grey">Tanggal Rentalan</label> 
            <input type="text" name="tanggal_pinjam" value="{{ $peminjamans->created_at }}" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label class="control-label"><font style="color:grey">Batas Waktu Rentalan</label> 
            <input type="text" name="tanggal_batas" value="{{ $peminjamans->tanggal_batas }}" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label class="control-label">Tanggal Kembali</label>  
            <input type="date" name="tanggal_kembali" class="form-control date">
          </div>
          <div class="form-group">
            <label><font style="color:grey">Keterangan</label>
            <select class="form-control select2" name="keterangan" required>
              <option value="">Pilih Keterangan</option>
              <option>Tepat Waktu</option>
              <option>Telat Mengembalikan</option>
              <option>Barang Rusak</option>
              <option>Barang Hilang</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-round btn-primary" ><i class="fa fa-caret"></i> Kembalikan</button>
            <a class="btn btn-round btn-danger" href="{{route('peminjaman.index')}}"><i class="fa fa-close-circle"></i> Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>// init flatpickr
  $(".date").flatpickr({
    nextArrow: '<i class="fa fa-long-arrow-right" />',
    prevArrow: '<i class="fa fa-long-arrow-left" />'
  });
</script>
@endpush