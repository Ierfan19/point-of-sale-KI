@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="container-fluid py-4">
    <form action="{{url('/transaksi/post')}}" method="post">
        {{csrf_field()}}
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Nama Barang</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nama-barang" readonly="" value="{{$transaksi->nama_barang}}">
            <input type="hidden" name="harga" value="{{$transaksi->harga}}">
            <input type="hidden" name="id_barang" value="{{$transaksi->id_barang}}">
            </div>
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Nama Pembeli</label>
            </div>
            <div class="col-md-9">
                <input type="text" onkeyup="Transaksi()" name="nama_pembeli" id="nama_pembeli">
                <input type="hidden" name="id_pembeli" id="id_pembeli">
                <input type="hidden" name="poin" id="poin">
                <i class="text-muted">note: nama pembeli berdasarkan data yg sudah ada</i>
            </div>
            

        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Jumlah</label>
            </div>
            <div class="col-md-9">
                <input type="hidden" value="{{$transaksi->stok}}" name="stok-awal" class="form-control">
                <input type="number" name="stok-akhir" class="form-control">
            </div>
            
            
        </div>
        @foreach($laporan as $row)
            <input type="hidden" name="sale" value="{{$row->sale}}">
            <input type="hidden" name="hasil" value="{{$row->hasil}}">
            <input type="hidden" name="jumlah_pembeli" value="{{$row->jumlah_pembeli}}">
            @endforeach
        <button class="btn btn-success">Send</button>
    </form>
</div>
@endsection

@push('bottom')

<script src="{{asset('/assets/js/jquery.js')}}"></script>
<script type="text/javascript">
    function Transaksi(){
      iddd = $('#nama_pembeli').val()
        if (iddd==''){
          $('#nama_pembeli').val('');
          $('#id_pembeli').val('');
          $('#poin').val('');
        }
        $.ajax({
          url:"{{route('cari')}}",
          type:"GET",
          dataType:"json",
          data:{
             id:$("#nama_pembeli").val()
           },
           success:function(hasil){
            
              // alert('Data tidak di temukan 3')
              $('#nama_pembeli').val(hasil.data.nama);
              $('#id_pembeli').val(hasil.data.id_pembeli);
              $('#poin').val(hasil.data.poin);
           }

       });
    }
  </script>
  @endpush
@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush