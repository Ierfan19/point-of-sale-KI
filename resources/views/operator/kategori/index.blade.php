@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <a href="tambahcategory" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Kategori </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($kategori as $row)
            <tr>
                <td class="py-1"> {{$loop->iteration}} </td>
                <td> {{$row->nama_kategori}} </td>
                <td>
                  <a href="/editcategory/{{$row->id_category}}" class="btn btn-primary"><i class="mdi mdi-pencil"></i>Edit</a>
                  <a href="/deletecategory/{{$row->id_category}}" class="btn btn-danger"><i class="mdi mdi-delete"></i>Hapus</a>
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
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush