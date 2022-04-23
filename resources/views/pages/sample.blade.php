@extends('layout.master')

@push('plugin-styles')
<link rel="stylesheet" href="{{asset('/assets/plugins/dragula/dragula.min.css')}}">
@endpush

@section('content')

@endsection

@push('plugin-scripts')
<link rel="stylesheet" href="{{asset('/assets/plugins/dragula/dragula.min.js')}}">
<link rel="stylesheet" href="{{asset('/assets/js/jquery.js')}}">
@endpush

@push('custom-scripts')
<script src="{{asset('/assets/js/dragula.js')}}"></script>
@endpush

@stack('bottom')