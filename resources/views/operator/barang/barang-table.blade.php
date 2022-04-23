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
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Barang </th>
                <th> Harga </th>
                <th> Stok </th>
                <th> Kategori </th>
                <th> poin </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($listbarang as $row)
            <tr>
                <td class="py-1"> {{$loop->iteration}} </td>
                <td> {{$row->nama_barang}} </td>
                <td> {{$row->harga}} </td>
                <td> {{$row->stok}} </td>
                <td> {{$row->Category->nama_kategori}} </td>
                <td> {{$row->poin}} </td>
                <td>
                  <a href="/editbarang/{{$row->id_barang}}" class="btn btn-primary"><i class="mdi mdi-pencil"></i>Edit</a>
                  <a href="/deletebarang/{{$row->id_barang}}" class="btn btn-danger"><i class="mdi mdi-delete"></i>Hapus</a>
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