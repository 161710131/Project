@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="row">
  <div class="col-12">
    <div class="card">
      <h2 class="card-body">
        Rental Barang
        <div class="float-right">
          <a class="btn btn-round btn-danger" href="{{route('peminjaman.index')}}"><i class="fa fa-close-circle"></i> Batal</a>
        </div>
      </h2>
      <div class="card-body">
        <form action="{{route('peminjaman.store')}}" method="post" id="insert_form" multiple>
          {{csrf_field()}}

          <!-- <div class="form-group {{ $errors->has('konsumen_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Konsumen</label>	
			  			<select name="konsumen_id" class="form-control">
			  				@foreach($konsumens as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('konsumen_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('konsumen_id') }}</strong>
                            </span>
                        @endif
			  	</div> -->

          <div class="table-responsive">
            <center>
              <table id="item_table" class="table">
                <tr id="last" align="center">
                  <th>Nama Konsumen</th>
                  <th>Barang Rentalan</th>
                  <th>Jumlah Rental</th>
                  <th>Batas Waktu Rental</th>
                  <th><button type="button" name="add" class="btn btn-primary btn-round add" onclick="addrow()"><i class="fa fa-plus-square"></i></button></th>
                </tr>
              </table>
            </center>
            <br>
            <!--             <input type="submit" name="submit" class="btn btn-info" value="Simpan"> -->
            <div align="right">
              <button type="submit" name="submit" class="btn btn-success btn-round" value="Pinjam"> Rental</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  //multiple insert
    function addrow(){
      var no = $('#item_table tr').length;
      var html = '';
      html +='<tr id="row_'+no+'">';
      html +='<td><select name="konsumen_id[]" class="form-control sl2">@foreach($konsumens as $data)<option value="{{$data->id}}">{{$data->nama}}</option>@endforeach</select></td>';
      html +='<td><select name="barang_id[]" class="form-control sl12">@foreach($barangs as $data)<option value="{{$data->id}}">{{$data->nama}}</option>@endforeach</select></td>';
      html +='<td><input type="number" name="jumlah_pinjam[]" class="form-control"/></td>';
      html +='<td><input type="date" name="tanggal_batas[]" class="form-control date"/></td>';
      html +='<td><button type="button" class="btn btn-round" style="background-color : darkviolet" onclick="remove('+ no +')"><i class="fa fa-minus-square"></i></button></td></tr>';
      $('#last').after(html);
      $('.sl2').select2();
      $('.date').flatpickr({
        nextArrow: '<i class="fa fa-long-arrow-right" />',
        prevArrow: '<i class="fa fa-long-arrow-left" />'
      });
    }
    function remove(no){
      $('#row_'+no).remove();
    }
</script>
@endsection
