@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="container-fluid py-4">
    <form action="{{url('/editpembeli')}}" method="post">
        {{csrf_field()}}
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Nama</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="{{$pembeli->nama}}" name="nama" class="form-control">
                <input type="hidden" value="{{$pembeli->id_pembeli}}" name="id" class="form-control">
            </div>
            
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Alamat</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="{{$pembeli->alamat}}" name="alamat" class="form-control">
            </div>
            
           
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">No Telp</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="{{$pembeli->no_telp}}" name="telp" class="form-control">
            </div>
            
            
        </div>
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Poin</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="{{$pembeli->poin}}" name="poin" class="form-control">
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