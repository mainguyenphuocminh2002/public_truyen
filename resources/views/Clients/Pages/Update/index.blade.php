@extends('Clients.layouts.mainLayout')

@section('moreHead')
    <!-- Favicon -->

    <!-- Bootstrap CSS -->

    <!-- Fontawesome CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/fontawesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('Clients/font/fa-4.7/css/font-awesome.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome/css/all.min.css') }}"> --}}

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Products;
Common::checkLogin();
$user = auth()->user();
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

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                                        <i class="fa fa-book" style="color: #b78a28!important;font-size: 24px"
                                            aria-hidden="true"></i>
                                        <div class="d-flex flex-column">
                                            <p class="py-1 m-0" style="flex:1;font-size:16px;">Số truyện</p>
                                            <p class="py-1 m-0" style="font-weight: bold;font-size: 16px">
                                                {{ count($productPost) }}</p>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                                        <i class="fa fa-list" style="color: #b78a28!important;font-size: 24px"
                                            aria-hidden="true"></i>
                                        <div class="d-flex flex-column">
                                            <p class="py-1 m-0" style="flex:1;font-size:16px;">Số chương</p>
                                            <p class="py-1 m-0" style="font-weight: bold;font-size: 16px">
                                                {{ $quantityChapters }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="btn_post_chapter">
                                    <a href="{{ route('clients.editProducts.create') }}"
                                        class="btn btn-primary btn-lg w-100">Đăng Truyện</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive" id="category_list">
                                    <table class="table table-center table-hover ">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tên</th>
                                                <th>Ngày tạo</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productPost as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('chapters.show', ['chapter' => $item->id]) }}"
                                                            class="btn btn-sm btn-white text-primary mr-2"><i
                                                                class="fa fa-eye mr-1"></i>Xem Chương</a>
                                                        {{-- @can('updatePermissions', Permissions::class) --}}
                                                        @can('updateProducts', [Products::class, $item])
                                                        <a href="{{ route('products.edit', ['product' => Common::changeIdToEncode($item->id)]) }}"
                                                            class="btn btn-sm btn-white text-success mr-2"><i
                                                                class="fa fa-edit mr-1"></i>Sửa</a>
                                                        @endcan
                                                        {{-- @endcan --}}
                                                        @can('deleteProducts', [Products::class, $item])

                                                            <button type="button"
                                                                class="btn btn-sm btn-white text-danger mr-2 delete"><i
                                                                    class="fa fa-trash mr-1"></i>Xóa</button>
                                                        @endcan
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
