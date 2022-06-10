@php
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
@endphp
<header class="header shadow p-4 rounded">
    <div class="container">
        <div class="row d-flex align-items-center ">

            <a href="{{ route('clients.home') }}"
                class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex justify-content-start header-item logo">
                ANIVALLEY
            </a>

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="nav-item d-flex align-items-center justify-content-around">
                    <a href="{{ route('clients.home') }}" class="col-auto header-item">
                        TRANG CHỦ
                    </a>

                    <a href="{{ route('Clients.categorys') }}" class="col-auto header-item">
                        THỂ LOẠI
                    </a>
                    <a href="{{route('Clients.categorys.newCreate')}}" class="col-auto header-item">
                        MỚI NHẤT
                    </a>
                    <a href="#" class="col-auto header-item">
                        TÌM KIẾM
                    </a>
                </div>
            </div>


            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 d-flex justify-content-end">
                @if (Auth::check())
                    <ul class="nav user-menu ">
                        <!-- Flag -->

                        <!-- /Flag -->
                        <!-- User Menu -->
                        <li class="nav-item dropdown has-arrow main-drop">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <span class="user-img">
                                    <img style="width: 40px !important;height: 40px;border-radius: 50%"
                                        src="{{ !empty($user->avatar) ? asset($user->avatar) : asset('Clients/images/avatar-profile.png') }}"
                                        alt="" />
                                    <span class="status online"></span>
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="ml-2 mt-2">
                                    <h6 class="m-0" style="text-transform: capitalize">Tên:
                                        {{ $user->name }}</h6>
                                    <p class="m-0"><i class="fa fa-ticket text-primary"
                                            style="color: #b78a28 !important" aria-hidden="true"></i>:
                                        {{ $user->ticket ?? '0' }}</p>
                                </div>
                                <div class="dropdown-divider my-1"></div>
                                <a class="dropdown-item pl-2" href="{{ route('clients.editProducts') }}">
                                    <i style="color: #b78a28 !important;font-size:20px;" class="fa fa-pencil-square-o"
                                        style="font-size: 24px" aria-hidden="true"></i>
                                    Đăng và sửa truyền</a>
                                <a class="dropdown-item pl-2" href="{{ route('clients.favourites') }}">
                                    <i style="color: #b78a28 !important;font-size:20px;" class="fa fa-heart mr-1"
                                        style="font-size: 24px" aria-hidden="true"></i>
                                    Favourites</a>
                                <a class="dropdown-item pl-2" href="{{ route('clients.ticket') }}">
                                    <i style="color: #b78a28 !important;font-size:20px;" class="fa fa-ticket mr-1"
                                        style="font-size: 24px" aria-hidden="true"></i>
                                    Nạp Vé</a>
                                <a class="dropdown-item pl-2" href="{{ route('clients.profile') }}"><svg
                                        style="color: #b78a28 !important" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user mr-1">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    Profile</a>
                                <a class="dropdown-item pl-2" href="{{ route('clients.logout') }}"><svg
                                        style="color: #b78a28 !important" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out mr-1">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- /User Menu -->
                    </ul>
                @else
                    <div class="icon-user">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </div>
                @endif

            </div>
            <div class="box-user">
                <div class="modal-user">
                    <div class="container">
                        <div class="w-100 pb-4">
                            <button type="button" class="btn modal-user-exit">&times</button>
                        </div>
                        <div role="tabpanel mt-5">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs d-flex align-items-center justify-content-center" role="tablist">

                                <li role="presentation" class="tab-sign active">
                                    <a href="#sign-in" aria-controls="sign-in" data-toggle="tab">ĐĂNG
                                        NHẬP</a>
                                </li>
                                <li role="presentation" class="tab-sign">
                                    <a href="#sign-up" aria-controls="sign-up" data-toggle="tab">ĐĂNG KÝ</a>
                                </li>
                            </ul>


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="sign-in">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="container" id="signInContent">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input name="email" type="email" placeholder="Vui Lòng Nhập Email..."
                                                    style="border-radius: 20px;" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label for="">Mật Khẩu</label>
                                                    <div id="forgotPassword" style="color: goldenrod;cursor: pointer;">
                                                        Quên Mật Khẩu
                                                    </div>
                                                </div>
                                                <input name="password" type="password"
                                                    placeholder="Vui Lòng Nhập Mật Khẩu..." style="border-radius: 20px;"
                                                    class="form-control">
                                            </div>

                                            <div class="form-group pb-3 text-center">

                                                <button type="submit" class="btn btn-primary btn-md btn-sign-in">ĐĂNG
                                                    NHẬP</button>

                                            </div>
                                        </div>

                                    </form>
                                    <div class="sign-in-footer text-center py-2">
                                        <p style="font-size: 20px;">Bạn Chưa Có Tài Khoản?<a href="#"
                                                class="sign-up-now" style="color: goldenrod;font-weight: bold;">Đăng
                                                Ký Ngay</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- Sign Up -->
                                <div role="tabpanel" class="tab-pane" id="sign-up">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="container">
                                            <div class="form-group">
                                                <label for="">Tên Đăng Nhập:</label>
                                                <input type="text" name="name" placeholder="Vui Lòng Nhập Email..."
                                                    style="border-radius: 20px;" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" name="email" placeholder="Vui Lòng Nhập Email..."
                                                    style="border-radius: 20px;" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <label for="">Mật Khẩu</label>
                                                </div>
                                                <input type="password" placeholder="Vui Lòng Nhập Mật Khẩu..."
                                                    style="border-radius: 20px;" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nhập Lại Mật Khẩu</label>
                                                <input type="password" name="re_password"
                                                    placeholder="Vui Lòng Nhập Lại Mật Khẩu..."
                                                    style="border-radius: 20px;" class="form-control">

                                            </div>

                                            <div class="form-group pb-3 text-center">

                                                <button type="submit" class="btn btn-primary btn-md btn-sign-in">ĐĂNG
                                                    KÝ</button>

                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="col-auto header-item">
            </div> -->
    </div>
    <script></script>
</header>
@section('js')
    <script>
        $('#forgotPassword').on('click', () => {
            $.ajax({
                type: "get",
                url: "{{ route('resetPasswordPage') }}",
                success: function(response) {
                    $('#sign-in').html(response)


                }
            });
        })
    </script>
@endsection
