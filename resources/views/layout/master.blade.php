<!DOCTYPE html>
<html>
<head>
  <title>Week 20 pos_KI</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}">

  <!-- plugin css -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
  
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>

  <!-- base js -->
  <script src="{{asset('js/app.js')}}"></script>
  <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
  
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}"></script>
  <script src="{{asset('assets/js/todolist.js')}}"></script>
  <!-- end common js -->

  @stack('custom-scripts')

<script src="{{asset('/assets/js/jquery.js')}}"></script>
@stack('bottom')
</body>
</html>
