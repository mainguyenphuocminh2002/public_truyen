<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('adminTitle') | ADMIN FOODO</title>


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/all.min.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">

    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datetimepicker.min.css') }}">

    <!-- daterangepicker CSS -->
    <link rel="stylesheet" href="{{ asset('admin//plugins/daterangepicker/daterangepicker.css') }}">

    <!-- quill CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/quill/css/quill.snow.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/datatables.min.css') }}">
    <!-- sweetalert2 CSS -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

    <!--[if lt IE 9]>
    <script src=""></script>
    <script src=""></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('admin/js/mine-config.js') }}"></script>
    @yield('adminCss')
</head>
