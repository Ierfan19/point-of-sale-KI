@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="container-fluid py-4">
    <form action="{{url('/addbarang')}}" method="post">
        {{csrf_field()}}
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Nama Barang</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="nama_barang" class="form-control">
            </div>
            
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Harga</label>
            </div>
            <div class="col-md-9">
                <input type="text" name="harga" class="form-control">
            </div>
            
           
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Stok</label>
            </div>
            <div class="col-md-9">
                <input type="number" name="stok" class="form-control">
            </div>
            
            
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Expired</label>
            </div>
            <div class="col-md-9">
                <input type="date" name="expired" class="form-control">
            </div>
            
            
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Poin</label>
            </div>
            <div class="col-md-9">
                <input type="nummber" name="poin" class="form-control">
            </div>
            
            
        </div>
        <!-- <div class="mb-4">
            <label for="" class="form-label">Jenis</label>
            <input type="text" name="jenis" class="form-control">

            
        </div> -->
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="">Kategori</label>
            </div>
            <div class="col-md-9">
                <select class="form-control" name="category">
                    <option value=""></option>
                    @foreach($listcat as $row)
                    <option value="{{$row->id_category}}">{{$row->nama_kategori}}</option>
                    @endforeach
            </select>
            </div>
            
            
        </div>
        <button class="btn btn-success">Send</button>
    </form>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush