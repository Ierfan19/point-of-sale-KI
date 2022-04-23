@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <a href="tambahbarang" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <input type="hidden" name="pembeli" id="pembeli" value="{{$pembeli->poin}}">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Barang </th>
                <th> poin </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($listbarang as $row)
            <tr>
                <td class="py-1"> {{$loop->iteration}} </td>
                <td> {{$row->nama_barang}} </td>
                <td> <input type="text" readonly name="poin" id="poin" value="{{$row->poin}}" class="form-control">  </td>
                <td>
                  <a href="javascript:javascript:void(0)" onclick="Tukarpoin()" class="btn btn-primary"><i class="mdi mdi-point"></i>Beli</a>
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

<script src="{{asset('/assets/js/jquery.js')}}"></script>
<script>
    function Tukarpoin(){
      tukar = $('#poin').val();
      pembeli = $('#pembeli').val();
      if(pembeli < tukar){
        alert('poin tidak cukup');
      }
      else{
        document.location.href="{ route('/tukarpoin/{{$row->id_barang}}') }";
      }
      
    }
</script>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush