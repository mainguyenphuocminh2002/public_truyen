<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    {{-- CSS --}}

    <link rel="stylesheet" href="{{ asset('Clients/css/bs4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Clients/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('Clients/js/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('Clients/js/owl/dist/assets/owl.carousel.min.css') }}">
    @yield('css')

    {{-- FONT --}}

    <link rel="stylesheet" href="{{ asset('Clients/font/fa-4.7/css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Francois+One&family=Raleway:wght@100&display=swap"
        rel="stylesheet">
    @yield('font')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    {{-- OWL CAROUSEL --}}

    <script src="{{asset('Clients/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('Clients/css/bs4/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Clients/css/bs4/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('Clients/js/select2/js/select2.min.js') }}"></script>

</head>
