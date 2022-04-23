@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> Table Pembeli</h4>
        <a href="tambahpembeli" class="btn btn-success">Tambah</a>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama  </th>
                <th> Alamat </th>
                <th> No Telp </th>
                <th> Poin </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($listpembeli as $row)
            <tr>
                <td class="py-1"> {{$loop->iteration}} </td>
                <td> {{$row->nama}} </td>
                <td> {{$row->alamat}} </td>
                <td> {{$row->no_telp}} </td>
                <td> {{$row->poin}} </td>
                <td>
                  <a href="/editpembeli/{{$row->id_pembeli}}" class="btn btn-primary"><i class="mdi mdi-pencil"></i>Edit</a>
                  <a href="/deletepembeli/{{$row->id_pembeli}}" class="btn btn-danger"><i class="mdi mdi-delete"></i>Hapus</a>
                  <a href="/tukarpoin/{{$row->id_pembeli}}" class="btn btn-info"><i class="mdi mdi-coin"></i>Tukar Poin</a>
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