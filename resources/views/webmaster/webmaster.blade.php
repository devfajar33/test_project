<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>TEST PROJECT SAGARA</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
        <link href="{{ asset('assets/css/simple-datatables.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        @include('masterpage.header')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('masterpage.menu')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
                @include('masterpage.footer')
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-2.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/js/fontawesome.js') }}" crossorigin="anonymous"></script>
        @yield('scripts')
        <script src="{{ asset('assets/js/simple-datatables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
