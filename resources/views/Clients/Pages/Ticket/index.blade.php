@extends('Clients.layouts.mainLayout')

@section('moreHead')
    <!-- Favicon -->

    <!-- Bootstrap CSS -->

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('Clients/font/fa-4.7/css/font-awesome.css') }}">
    
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/fontawesome.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/all.min.css') }}"> --}}
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Clients/css/category/main.css') }}">
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Authors;
use App\Models\Admin\Products;
Common::checkLogin();
$user = auth()->user();
$productClass = new Products();
@endphp

@section('content')
    <div class="container py-5">
        <div style="padding: 5rem 0" class="content container-fluid">
            <div id="create_user" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="thumbnail-upload">
                                        <div class="thumbnail-preview">
                                            <div id="thumbnailPreview"
                                                style="background-image: url('{{ asset('Clients/images/avatar-profile.png') }}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <i class="fa fa-book" style="color: #b78a28!important;font-size: 24px"
                                            aria-hidden="true"></i>
                                        <div class="d-flex flex-column">
                                            <p class="py-1 m-0" style="flex:1;font-size:16px;">Số truyện yêu thích</p>
                                            <p class="py-1 m-0" style="font-weight: bold;font-size: 16px">
                                                {{ count($favoritesProducts) }}</p>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">
                            @if (!$favoritesProducts->isEmpty())
                                @foreach ($favoritesProducts as $product)
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="product">
                                            <a href="{{ route('Clients.detail', ['alias' => $product->alias]) }}"
                                                style="color: #000;" class="d-flex py-3 product-item">
                                                <div class="mr-3">

                                                    <img style="width: 90px;height: 120px;"
                                                        src='{{ asset("$product->thumbnail") }}' id="thumbnail"
                                                        alt="Image">

                                                </div>

                                                <div class="product-body" style="word-break: break-word;">

                                                    <div class="product-body-title">
                                                        <h2 id="name" style="font-size: 18px;font-weight: bold;">
                                                            {{ $product->name }}
                                                        </h2>
                                                    </div>

                                                    <div id="description" style="color: #000;" class="mb-1 description">

                                                        {!! $product->description !!}

                                                    </div>

                                                    <div class="product-body-footer">
                                                        <footer style="color: #000;"
                                                            class="footer-author d-flex align-items-center">
                                                            <i class="fa fa-user mr-2" aria-hidden="true"></i>
                                                            <span
                                                                id="author_name">{{ Authors::findOrFail($product->author_id)->name }}</span>
                                                            {{-- <span id="category"
                                                    class="tag-category category d-flex align-items-center border border-primary small px-2 text-primary ml-auto"
                                                    style="">{{$product->categorys->where('parent_id',1)->first->name}}</span> --}}
                                                        </footer>
                                                        <footer style="color: #000;"
                                                            class="footer-author chapter d-flex align-items-center">
                                                            <i class="fa fa-bars mr-2" aria-hidden="true"></i>
                                                            <div id="quantity">
                                                                {{ $productClass->getQuantity($product->id) }}
                                                            </div>
                                                            <span class="ml-1">
                                                                Chương
                                                            </span>
                                                        </footer>
                                                    </div>

                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center w-100 h-100 mt-5" style="font-size: 30px;">Không Có Truyện Yêu Thích
                                    !!!</p>
                            @endif

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
@section('js')
    <!-- Bootstrap Core JS -->

    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('admin/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Datepicker Core JS -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- quill JS -->
    <script src="{{ asset('admin/plugins/quill/js/quill.js') }}"></script>

    <!-- Form Validation JS -->
    <script src="{{ asset('admin/js/form-validation.js') }}"></script>

    <!-- daterangepicker JS -->
    <script src="{{ asset('admin//plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Datatables JS -->
    <!-- <script src=""></script> -->
    <script src="{{ asset('admin/plugins/datatables/datatables.min.js') }}"></script>

    <!-- sweetalert2 JS -->
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- voucher_codes JS -->
    <script src="{{ asset('admin/js/voucher_codes.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/js/script.js') }}"></script>
    {{-- <script src="{{ asset('admin/plugins/ckfinder/config.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin/js/mine-config.js') }}"></script> --}}

    <!-- Bootstrap Core JS -->

    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('admin/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('admin/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Select2 JS -->
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Datepicker Core JS -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- quill JS -->
    <script src="{{ asset('admin/plugins/quill/js/quill.js') }}"></script>

    <!-- Form Validation JS -->
    <script src="{{ asset('admin/js/form-validation.js') }}"></script>

    <!-- daterangepicker JS -->
    <script src="{{ asset('admin//plugins/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Datatables JS -->
    <!-- <script src=""></script> -->
    <script src="{{ asset('admin/plugins/datatables/datatables.min.js') }}"></script>

    <!-- sweetalert2 JS -->
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- voucher_codes JS -->
    <script src="{{ asset('admin/js/voucher_codes.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('admin/js/script.js') }}"></script>
    {{-- <script src="{{ asset('admin/plugins/ckfinder/config.js') }}"></script> --}}

    {{-- <script src="{{ asset('admin/js/mine-config.js') }}"></script> --}}
@endsection
