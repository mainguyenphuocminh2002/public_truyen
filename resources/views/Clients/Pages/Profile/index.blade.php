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
    <form action="{{ route('clients.profile.store') }}" method="POST" class="container py-5" enctype="multipart/form-data">
        @csrf
        <div style="padding: 5rem 0" class="content container-fluid">
            <div id="create_user" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    @error('avatar')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="thumbnail-upload">
                                        <div class="thumbnail-edit">
                                            <input type="file" id="thumbnail" name="avatar" />
                                            <label for="thumbnail"><i class="fa fa-pencil"></i></label>
                                        </div>
                                        <div class="thumbnail-preview">
                                            <div id="thumbnailPreview"
                                                style="background-image: url('{{ isset($user->avatar) ? asset($user->avatar) : asset('admin/img/avatar-default.png') }}')">
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
                                                {{ count($productPost) }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
                                        <i class="fa fa-list" style="color: #b78a28!important;font-size: 24px"
                                            aria-hidden="true"></i>
                                        <div class="d-flex flex-column">
                                            <p class="py-1 m-0" style="flex:1;font-size:16px;">Số chương</p>
                                            <p class="py-1 m-0" style="font-weight: bold;font-size: 16px">
                                                {{ $quantityChapters }}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">


                                <div class="row">

                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
                                        <div class="form-group">
                                            <label for="">Tên: </label>
                                            <input type="text" name="name" value="{{ old('name') ?? $user->name }}"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Số Điện Thoại: </label>
                                            <input type="text" name="phone" value="{{ old('phone') ?? $user->phone }}"
                                                class="form-control">
                                        </div>

                                        <div class=" form-group">
                                            <label class="d-block">Giới tính:</label>
                                            @error('gender')
                                                <div class="text-danger text-capitalize">{{ $message }}</div>
                                            @enderror
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                                    value="0" {{ $user->gender === 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender_male">Nam</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="gender_female" value="1"
                                                    {{ $user->gender === 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="gender_female">Nữ</label>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <label>Mật khẩu</label>
                                            @error('password')
                                                <div class="text-danger text-capitalize">{{ $message }}</div>
                                            @enderror
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input" name="password"
                                                    id="PassEntry" required>
                                                <div class=" invalid-feedback">Vui lòng nhập mật khẩu.</div>
                                            </div>

                                        </div>

                                        <div class="form-group ">
                                            <label>Nhập lại mật khẩu</label>
                                            @error('re_password')
                                                <div class="text-danger text-capitalize">{{ $message }}</div>
                                            @enderror
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input" name="re_password"
                                                    id="re_password" required>
                                                <div class=" invalid-feedback">Vui lòng nhập lại mật khẩu.</div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </form>
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
