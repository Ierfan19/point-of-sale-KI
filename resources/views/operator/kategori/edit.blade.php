@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<div class="container-fluid py-4">
    <form action="{{url('/editcategory')}}" method="post">
        {{csrf_field()}}
        <div class="mb-4 d-flex flex-row">
            <div class="col-md-2">
                <label for="" class="form-label">Nama Category</label>
            </div>
            <div class="col-md-9">
                <input type="text" value="{{$edit->nama_kategori}}" name="nama_category" class="form-control">
                <input type="hidden" value="{{$edit->id_category}}" name="id" class="form-control">
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