@extends('Clients.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" href="{{ asset('Clients/css/detail/detail.css') }}">
@endsection

@php
use App\Helper\Common;
use Illuminate\Support\Carbon;
$user = auth()->user();
$now = Carbon::now();
// $chapterViewed = $_COOKIE['chapWatched'];
// dd
$chapViewed = isset($_COOKIE['chapViewed']) ? $_COOKIE['chapViewed'] : null;

@endphp

@section('font')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
@endsection

@section('title')
@endsection

@section('content')
    <a href="#" class="banner">
        <span
            style='background-image: url("https://static.cdnno.com/storage/topbox/d40cd3310c03819136b438c9fc9455e4.jpg"); position: absolute; z-index: -1; left: 0px; overflow: hidden; width: 100%; height: 388px; background-repeat: no-repeat; background-position: 50% 0px; background-size: cover;'>

        </span>
    </a>
    <main class="main mb-4">
        <div class="container">
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="product-detail d-flex align-items-start">

                            <div style="width: 210px;" class="mr-4">
                                <img class="img-fluid" src="{{ asset($product->thumbnail) }}"
                                    alt="{{ $product->name }}">

                            </div>
                            <div class="d-flex flex-column">
                                <h1 style="font-weight: 300;color:#000;font-size: 25px;">{{ $product->name }}</h1>
                                <ul class="category-detail-list d-flex mb-5 mt-2">
                                    @foreach ($categorys as $category)
                                        <li><a href="{{ route('Clients.categorys', ['name' => $category->name, 'chap' => 1]) }}"
                                                class="category-detail-link btn btn-md mr-2 px-3 py-1">
                                                {{ $category->name }}
                                            </a></li>
                                    @endforeach
                                </ul>
                                <div class="product-detail-info mb-3">
                                    <ul style="list-style-type: none;" class="d-flex justify-content-start">

                                        <li class="mr-5">
                                            <div style="font-weight: bold;font-size:20px ;">{{ $product->chapters }}</div>
                                            <p style="font-size: 16px;">Chương</p>
                                        </li>

                                        <li class="mr-5">
                                            <div style="font-weight: bold;font-size:20px ;">{{ $product->chapters }}</div>
                                            <p style="font-size: 16px;">Chương/Tuần</p>
                                        </li>

                                        <li class="mr-5">
                                            <div style="font-weight: bold;font-size:20px ;">
                                                {{ Common::makeView($product->views) ?? 0 }}
                                            </div>
                                            <p style="font-size: 16px;">Lượt Xem</p>
                                        </li>

                                        <li class="mr-5">
                                            <div class="favourite-quantity" style="font-weight: bold;font-size:20px ;">
                                                {{ $favorites }}
                                            </div>
                                            <p style="font-size: 16px;">Cất Giữ</p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail-widget mt-2">
                                    <ul style="list-style-type: none;" class="d-flex ">
                                        <li class="mr-4"><a class="rd-detail btn btn-md px-3 py-2"
                                                href="{{ route('Clients.watch', ['alias' => $product->alias, 'chap' => $chapViewed ?? $chapters[0]->id]) }}"><i
                                                    class="fa fa-eye" aria-hidden="true"></i>
                                                Đọc Truyện</a></li>
                                        <li class="mr-4">
                                            <div id="mark" class="mar-detail btn btn-md px-3 py-2">
                                                @if (isset($favouritesUserChoose))
                                                    <i class="fa fa-bookmark" aria-hidden="true"></i>
                                                    Đánh Dấu
                                                @else
                                                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                                    Đánh Dấu
                                                @endif
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="detail tab mt-5">
                            <!-- Nav tabs -->
                            <ul class="detail-tab-list">
                                <li class="mr-3 tabs active">
                                    <p class="px-2">Giới Thiệu</p>
                                </li>
                                <li class="mr-3 tabs">
                                    <p class="px-2">Danh Sách Chương</p>
                                </li>
                                <li class="mr-3 tabs">
                                    <p class="px-2">Bình Luận</p>
                                </li>
                                <div class="tab-line"></div>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="detail-tab-pane active">
                                    {!! $product->description !!}
                                </div>
                                <div class="detail-tab-pane">
                                    <div class="row">
                                        @foreach ($chapters as $chapter)
                                            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 mb-3">
                                                <li class="list-chapters-item"><a href="">{{ $chapter->title }}</a></li>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="detail-tab-pane">

                                    <div class="row">

                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                            <div class="comment">
                                                <div style="font-size: 20px;"
                                                    class="comment-head d-flex align-items-start flex-column">
                                                    <div class="d-flex justify-content-between w-100">
                                                        <p class="cmt-count"><span id="quantity"
                                                                class="mr-1"></span> Bình Luận</p>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                style="background:none;border: none;color: #000;font-weight: 400;outline: none !important"
                                                                class=" dropdown-toggle p-0 shadow-none"
                                                                data-toggle="dropdown">
                                                                Mới Cập Nhật
                                                            </button>
                                                            <div style="outline: none !important;;"
                                                                class="dropdown-menu shadow-none">
                                                                <a class="dropdown-item shadow-none" href="#">Mới Cập
                                                                    Nhật</a>
                                                                <a class="dropdown-item shadow-none" href="#">Mới Đăng</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="border-bottom: 1px solid #eee;" class="w-100 pb-4">
                                                        <p id="erros-body" style="color: red;font-size:16px;"></p>
                                                        <div class=" w-100 d-flex justify-content-start">
                                                            <div class="comment-img mr-2">

                                                                <img id="comment-img"
                                                                    src="{{ $user->avatar ?? asset('Clients/images/avatar-profile.png') }}"
                                                                    class="img-fluid" alt="Image">

                                                            </div>
                                                            <div class="w-100 d-flex align-items-center"
                                                                style="position: relative;">
                                                                <textarea class="box-comment w-100 px-3 py-2" placeholder="Nhập Bình Luận Tại Đây..." name="" id="boxComment" cols="30"
                                                                    rows="2"></textarea>
                                                                <div class="h-100 comment-send">
                                                                    <button class="btn btn-default btn-comment h-100"
                                                                        style="box-shadow: none;background: none"><i
                                                                            class="fa fa-paper-plane"
                                                                            aria-hidden="true"></i>
                                                                    </button>

                                                                </div>

                                                            </div>


                                                        </div>


                                                    </div>
                                                    <div class="comment-v mt-4 pb-2 w-100 d-flex align-items-start row">
                                                        @foreach ($comments as $comment)
                                                            <div style="border-bottom: 1px solid #eee;"
                                                                class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-start mt-2">
                                                                <div class="comment-v-img mr-4">

                                                                    <img src="{{ $user->avatar ?? asset('Clients/images/avatar-profile.png') }}"
                                                                        class="img-fluid" alt="Image">

                                                                </div>

                                                                <div class="comment-v-content">
                                                                    <p id="comment-name">{{ $user->name ?? 'Guest' }}</p>
                                                                    <p class="comment-time">
                                                                        {{ Carbon::parse($comment->created_at)->diffForHumans($now) }}
                                                                    </p>
                                                                    <p id="comment-content">{{ $comment->body }}</p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="float-right mt-3">
                                                        {{ $comments->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

        </div>
    </main>
@endsection

@section('js')
    <script>
        const tabs = document.querySelectorAll(".tabs");
        const tabspane = document.querySelectorAll(".detail-tab-pane");
        const tabActive = document.querySelector(".tabs.active");
        const line = document.querySelector(".tab-line");

        if (localStorage.getItem('panes')) {
            index = localStorage.getItem('panes');
            const tabpane = tabspane[index];
            document.querySelector(".tabs.active").classList.remove("active");
            document.querySelector(".detail-tab-pane.active").classList.remove("active");
            line.style.left = tabs[index].offsetLeft + "px";
            line.style.width = tabs[index].offsetWidth + "px";
            tabs[index].classList.add("active");
            tabpane.classList.add("active");
            console.log(index);
            localStorage.setItem('panes', index);
        }

        tabs.forEach((tab, index) => {
            const tabpane = tabspane[index];
            tab.onclick = function() {
                document.querySelector(".tabs.active").classList.remove("active");
                document.querySelector(".detail-tab-pane.active").classList.remove("active");
                line.style.left = this.offsetLeft + "px";
                line.style.width = this.offsetWidth + "px";
                this.classList.add("active");
                tabpane.classList.add("active");
                console.log(index);
                localStorage.setItem('panes', index);
            };
        });


        function checkLogin(callback) {
            $.ajax({
                type: "POST",
                url: "{{ route('checkLoginUser') }}",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(login) {
                    login = parseInt(login);
                    callback(login);
                }
            });
        }
        const handleBoxComment = function(login = null) {
            if (!login) {
                $('.box-user').css('display', 'block')
                return; 
            }
        }

        const handleBtnComment = function(login = null) {
            if (!login) {
                $('.box-user').css('display', 'block')
                return;
            }
        }

        $('#boxComment').on('focus', function() {
            checkLogin(handleBoxComment);
        })
        $('.btn-comment').on('click', function() {
            checkLogin(handleBtnComment)
                @if ($user)
                    let imgUser = '';
                    let box = $('.comment-v');
                    let value = $('#boxComment').val();

                    $.ajax({
                        type: "POST",
                        url: "{{ route('Comment.store') }}",
                        data: {
                            body: value,
                            product_id: "{{ $product->id }}",
                            user_id: "{{ $user->id }}",
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: "JSON",
                        success: function(response) {
                            $('#boxComment').val('');
                            for (key in response) {
                                if (typeof response[key] === 'object') {
                                    $('#erros-' + key).text(response[key][0])
                                } else {
                                    $('#' + key).text(response[key])

                                }
                            }

                            let {
                                status
                            } = response;
                            if (typeof status !== 'object') {
                                let imgUser = $('#comment-img').attr(
                                    'src');
                                let html = `
                                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-items-start mt-2">
                                                    <div class="comment-v-img mr-4">

                                                        <img src="${imgUser}" class="img-fluid" alt="Image">

                                                    </div>

                                                    <div class="comment-v-content">
                                                        <p id="comment-name">{{ $user->name }}</p>
                                                        <p class="comment-time">Vài Giây Trước</p>
                                                        <p id="comment-content">${value}</p>
                                                    </div>
                                                </div>
                                                `
                                box.prepend(html);
                            }
                        }
                    })
                @endif
            })



        const handleMark = function(login = null) {
            if (!login) {
                $('.box-user').css('display', 'block')
            }
        }



        // Favourite
        $('#mark').on('click', function() {
                checkLogin(handleMark)
                @if ($user)
                    let markIcon = $(this).find('i');
                    let markClass = markIcon.attr('class');
                    if (markClass === 'fa fa-bookmark-o') {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('Favourite.store') }}",
                            data: {
                                product_id: "{{ $product->id }}",
                                user_id: "{{ $user->id }}",
                                _token: "{{ csrf_token() }}"
                            },
                            dataType: "JSON",

                            success: function(response) {
                                let {
                                    status,
                                    quantity
                                } = response;
                                if (typeof status !== 'object') {
                                    $('.favourite-quantity').text(quantity)
                                    markIcon.attr('class', 'fa fa-bookmark')
                                }
                            }
                        });
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('Favourite.delete') }}",
                            data: {
                                product_id: "{{ $product->id }}",
                                user_id: "{{ $user->id }}",
                                _token: "{{ csrf_token() }}"
                            },
                            dataType: "JSON",

                            success: function(response) {
                                let {
                                    status,
                                    quantity
                                } = response;
                                if (typeof status !== 'object') {
                                    $('.favourite-quantity').text(quantity)
                                    markIcon.attr('class', 'fa fa-bookmark-o')
                                }
                            }
                        });
                    }
                @endif
            })
    </script>
@endsection
