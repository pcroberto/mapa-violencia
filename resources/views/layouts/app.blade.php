<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>Mapa Colaborativo - @yield('title')</title>
  
    <!-- Custom fonts for this template-->
  
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/lib/sb-admin.min.css') }}" rel="stylesheet">
  
    <link href="{{ asset('css/lib/dataTables.bootstrap4.css') }}" rel="stylesheet">
  
    <link href="{{ asset('css/colors.css') }}" rel="stylesheet">
  
    @yield('style')

</head>

<body id="page-top">

    @include('partials.nav-top')
  
    @yield('content')
    
    @include('partials.modal-logout')
  
    <footer class="page-footer font-small bg-dark">
        <div class="footer-copyright text-center py-3 text-white">
            © 2019 Copyright:
            <a href="https://mapadaviolencia.com.br"> mapadaviolencia.com.br</a>
        </div>
    </footer>

</body>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/lib/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/lib/sb-admin.js') }}"></script>

@yield('scripts')
</html>
