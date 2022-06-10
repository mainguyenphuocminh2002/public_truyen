@extends('Clients.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" href="{{ asset('Clients/css/watch/watch.css') }}">
    <style>
        .watch-widget.widget-active {
            position: fixed;
            right: 10%;
        }

    </style>
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Authors;
use Illuminate\Support\Carbon;
$now = Carbon::now();
setcookie('chapViewed', $chapter->id, time() + 86400 * 30, '/detail'); // 86400 = 1 day
$user = auth()->user();
@endphp

@section('font')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
@endsection

@section('content')
    <div class="container d-flex justify-content-center wrapper">
        <main class="">
            @php
                // var_dump($chapter->price);
                // dd($userBuyIt->contains('id',$chapter->id));
                // var_dump(isset($userBuyIt->id));
                // die();
                // true true
            @endphp
            @if (isset($chapter->price) && isset($userBuyIt) ? ($userBuyIt->contains('id', $chapter->id) ? false : true) : true)
                <div class="container w-100 h-100 d-flex justify-content-center align-items-center flex-column"
                    style="min-height: 500px">
                    <p style="font-size: 25px;font-weight:bold;">Bạn cần {{ $chapter->price }} <i
                            class="fa fa-ticket text-primary" style="color: #b78a28 !important" aria-hidden="true"></i>
                        để mở khóa chương truyện này</p>
                    <form method="POST" action="{{ route('clients.buyChapter', ['price' => $chapter->price]) }}">
                        @csrf
                        <button class="btn btn-primary btn-lg">Ấn vào đây để mua</button>
                    </form>
                </div>
            @else
                @if (isset($chapter->price))
                    @if (isset($userBuyIt) ? $userBuyIt->contains('id', $chapter->id) : false)
                        <div class="container main-read py-4 mt-1"
                            style="border-radius: 20px;background-color: #eae4d3;position: relative;">
                            {{-- <div class="main-read"> --}}
                            <div class="watch-title">
                                <div class="read-title my-2">
                                    {{ $chapter->title }}
                                </div>
                                <ul class="d-flex justify-content-between align-userBuyIts-center "
                                    style="list-style-type: none;font-size:14px;">
                                    <div class="d-flex">
                                        <li class="mr-3 d-flex align-userBuyIts-center"><i class="fa fa-book"
                                                aria-hidden="true"></i><a class="watch-product-title" style="color: #000;"
                                                href="">
                                                <h1 style="font-size: 16px;margin: 0 !important;">{{ $product->name }}
                                                </h1>
                                            </a>
                                        </li>
                                        <li class=""><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i>{{ Authors::find($product->author_id)->name }}
                                        </li>
                                    </div>
                                    <li>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $product->created_at }}
                                    </li>
                                </ul>
                            </div>
                            <div class="watch-content">
                                {!! $chapter->content !!}
                            </div>

                            {{-- </div> --}}
                            <div class="watch-widget">
                                <ul style="list-style-type: none; position: relative;">
                                    <li class="d-flex align-userBuyIts-center"><button
                                            class="btn mt-2 shadow-none btn-watch-widget btn-chapter"><i
                                                class="fa fa-bars" aria-hidden="true"></i>
                                        </button>
                                        <ul class="list-chapters p-3">
                                            <div class="d-flex align-userBuyIts-start justify-content-between">
                                                <div style="font-size: 25px;" class="mb-4">Danh Sách Chương
                                                </div>
                                                <p class="exit-chapter" style="font-size: 30px;cursor: pointer;">
                                                    &times;
                                                </p>
                                            </div>
                                            <div style="border-bottom: 1px dashed #eee;">
                                                <div class="row">
                                                    @foreach ($listChapters as $chapterCount)
                                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                                            <li class="list-chapters-userBuyIt"><a
                                                                    href="{{ route('Clients.watch', ['alias' => $product->alias, 'chap' => $chapterCount->id]) }}">{{ $chapterCount->title }}</a>
                                                            </li>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li class="d-flex align-userBuyIts-center" style="position: relative;"><button
                                            class="btn mt-2 btn-conf shadow-none btn-watch-widget"><i class="fa fa-cog"
                                                aria-hidden="true"></i>
                                        </button>

                                        <table class="table config-chapters">
                                            <thead>
                                                <tr class="">
                                                    <th>
                                                        <div style="font-size: 25px;" class="">Cài Đặt
                                                        </div>
                                                    </th>
                                                    <th class="float-right pr-3 exit-conf"
                                                        style="font-size: 30px;cursor: pointer;">
                                                        &times;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="d-flex" style="font-size: 15px;">
                                                        <div style="width: 20px;height: 20px;" class="mr-2">
                                                            <img class="img-fluid" src="./palette.png" alt="">
                                                        </div>Màu Nền
                                                    </td>
                                                    <td>
                                                        <ul class="list-color d-flex flex-wrap"
                                                            style="list-style-type: none; box-sizing: border-box;">
                                                            <li class=""><button value="#f5e4e4"
                                                                    style="background-color:#f5e4e4 ;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                            <li class=""><button value="#f5ebcd"
                                                                    style="background-color:#f5ebcd ;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                            <li class=""><button value="#e2eee2"
                                                                    style="background-color:#e2eee2 ;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                            <li class=""><button value="#e1e8e8"
                                                                    style="background-color:#e1e8e8 ;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                            <li class=""><button value="#eae4d3"
                                                                    style="background-color:#eae4d3;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                            <li class=""><button value="#e5e3df"
                                                                    style="background-color:#e5e3df ;"
                                                                    class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="">
                                                        <div class="d-flex align-userBuyIts-center"
                                                            style="font-size: 15px;">
                                                            <i class="fa fa-font mr-2" aria-hidden="true"
                                                                style="font-size: 20px !important;"></i>
                                                            Font Chữ
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="" class="select font-read" id="">
                                                            <option value="Arial">Arial</option>
                                                            <option value="Roboto">Roboto</option>
                                                            <option value="Times New Roman">Times New Roman</option>
                                                            <option value="Tahoma">Tahoma</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-userBuyIts-center"
                                                            style="font-size: 15px;">
                                                            <i class="fa fa-text-height mr-2" aria-hidden="true"
                                                                style="font-size: 20px !important;"></i>
                                                            Cỡ Chữ
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-around">
                                                            <button
                                                                onclick="btnRemove('watch-content','fontSize-number','font-size',1,20,'px')"
                                                                class="btn removeNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center1 fa fa-minus"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                            <div
                                                                class="d-flex justify-content-start align-userBuyIts-center">

                                                                <p class="fontSize-number" style="margin: 0;">20</p>
                                                                <p style="margin: 0;">px</p>
                                                            </div>
                                                            <button
                                                                onclick="btnAdd('fontSize-number','font-size',1,30,'px')"
                                                                class="btn addNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-userBuyIts-center"
                                                            style="font-size: 15px;">
                                                            <i class="fa fa-arrows-h mr-2" aria-hidden="true"
                                                                style="font-size: 20px !important;"></i>
                                                            Chiều Rộng Khung
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-around">
                                                            <button
                                                                onclick="btnRemove('main-read','watchSize-box','width',100,700)"
                                                                class="btn addNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center fa fa-minus"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                            <div
                                                                class="d-flex justify-content-start align-userBuyIts-center">
                                                                <p class="watchSize-box" style="margin: 0;">700</p>
                                                                <p style="margin: 0;">px</p>
                                                            </div>
                                                            <button onclick="btnAdd('watchSize-box','width',100 ,1000)"
                                                                class="btn addNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-userBuyIts-center"
                                                            style="font-size: 15px;">
                                                            <i class="fa fa-arrows-v mr-2" aria-hidden="true"
                                                                style="font-size: 20px !important;"></i>
                                                            Giãn Dòng
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex justify-content-around">
                                                            <button
                                                                onclick="btnRemove('watch-content','watchSize-height','line-height',10,100,'%')"
                                                                class="btn addNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center1 fa fa-minus"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                            <div
                                                                class="d-flex justify-content-start align-userBuyIts-center">
                                                                <p class="watchSize-height" style="margin: 0;">100</p>
                                                                <p style="margin: 0;">%</p>
                                                            </div>
                                                            <button
                                                                onclick="btnAdd('watchSize-height','line-height',10,200,'%')"
                                                                class="btn addNumber shadow-none">
                                                                <i style="font-size: 20px;"
                                                                    class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                    aria-hidden="true"></i>

                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </li>
                                    <li class="d-flex align-userBuyIts-center"><button id="mark"
                                            class="btn mt-2 shadow-none btn-watch-widget"><i class="fa fa-bookmark-o"
                                                aria-hidden="true"></i>
                                        </button></li>
                                    <li class="d-flex align-userBuyIts-center"><button
                                            class="btn mt-2 shadow-none btn-watch-widget"><i class="fa fa-comments-o"
                                                aria-hidden="true"></i>
                                        </button></li>
                                </ul>
                            </div>


                            <div class="paginate">

                                <div class="row">

                                    <a href="#" style="font-size: 25px;font-weight: bold;border: 1px solid #2222;"
                                        class="prev-chapter px-3 py-1 mb-4 text-left col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                        Chương Trước
                                    </a>


                                    <a href="watch/{{ $product->alias }}/{{ $product->id - 1 }}"
                                        style="font-size: 25px;font-weight: bold;border: 1px solid #2222;"
                                        class="next-chapter px-3 py-1 mb-4 text-right col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        Chương Sau
                                        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    </a>

                                </div>

                            </div>

                            <div class="comment">
                                <div style="font-size: 20px;"
                                    class="comment-head d-flex align-userBuyIts-start flex-column">
                                    <div class="d-flex justify-content-between w-100">
                                        <p class="cmt-count"><span id="quantity" class="mr-1"></span>
                                            Bình
                                            Luận</p>
                                        <div class="dropdown">
                                            <button type="button"
                                                style="background:none;border: none;color: #000;font-weight: 400;outline: none !important"
                                                class=" dropdown-toggle p-0 shadow-none" data-toggle="dropdown">
                                                Mới Cập Nhật
                                            </button>
                                            <div style="outline: none !important;;" class="dropdown-menu shadow-none">
                                                <a class="dropdown-userBuyIt shadow-none" href="#">Mới Cập
                                                    Nhật</a>
                                                <a class="dropdown-userBuyIt shadow-none" href="#">Mới Đăng</a>
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
                                            <div class="w-100 d-flex align-userBuyIts-center" style="position: relative;">
                                                <textarea class="box-comment w-100 px-3 py-2" placeholder="Nhập Bình Luận Tại Đây..." name="" id="boxComment" cols="30"
                                                    rows="2"></textarea>
                                                <div class="h-100 comment-send">
                                                    <button class="btn btn-default btn-comment h-100"
                                                        style="box-shadow: none;background: none"><i
                                                            class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    </button>

                                                </div>

                                            </div>


                                        </div>


                                    </div>
                                    <div class="comment-v mt-4 pb-2 w-100 d-flex align-userBuyIts-start row">
                                        @foreach ($comments as $comment)
                                            <div style="border-bottom: 1px solid #eee;"
                                                class="col-lg-12 col-md-12 col-sm-12 d-flex align-userBuyIts-start mt-2">
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
                    @endif
                @else
                    <div class="container main-read py-4 mt-1"
                        style="border-radius: 20px;background-color: #eae4d3;position: relative;">
                        {{-- <div class="main-read"> --}}
                        <div class="watch-title">
                            <div class="read-title my-2">
                                {{ $chapter->title }}
                            </div>
                            <ul class="d-flex justify-content-between align-userBuyIts-center "
                                style="list-style-type: none;font-size:14px;">
                                <div class="d-flex">
                                    <li class="mr-3 d-flex align-userBuyIts-center"><i class="fa fa-book"
                                            aria-hidden="true"></i><a class="watch-product-title" style="color: #000;"
                                            href="">
                                            <h1 style="font-size: 16px;margin: 0 !important;">{{ $product->name }}
                                            </h1>
                                        </a>
                                    </li>
                                    <li class=""><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i>{{ Authors::find($product->author_id)->name }}
                                    </li>
                                </div>
                                <li>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{ $product->created_at }}
                                </li>
                            </ul>
                        </div>
                        <div class="watch-content">
                            {!! $chapter->content !!}
                        </div>

                        {{-- </div> --}}
                        <div class="watch-widget">
                            <ul style="list-style-type: none; position: relative;">
                                <li class="d-flex align-userBuyIts-center"><button
                                        class="btn mt-2 shadow-none btn-watch-widget btn-chapter"><i
                                            class="fa fa-bars" aria-hidden="true"></i>
                                    </button>
                                    <ul class="list-chapters p-3">
                                        <div class="d-flex align-userBuyIts-start justify-content-between">
                                            <div style="font-size: 25px;" class="mb-4">Danh Sách Chương</div>
                                            <p class="exit-chapter" style="font-size: 30px;cursor: pointer;">&times;
                                            </p>
                                        </div>
                                        <div style="border-bottom: 1px dashed #eee;">
                                            <div class="row">
                                                @foreach ($listChapters as $chapterCount)
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mb-3">
                                                        <li class="list-chapters-userBuyIt"><a
                                                                href="{{ route('Clients.watch', ['alias' => $product->alias, 'chap' => $chapterCount->id]) }}">{{ $chapterCount->title }}</a>
                                                        </li>

                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="d-flex align-userBuyIts-center" style="position: relative;"><button
                                        class="btn mt-2 btn-conf shadow-none btn-watch-widget"><i class="fa fa-cog"
                                            aria-hidden="true"></i>
                                    </button>

                                    <table class="table config-chapters">
                                        <thead>
                                            <tr class="">
                                                <th>
                                                    <div style="font-size: 25px;" class="">Cài Đặt</div>
                                                </th>
                                                <th class="float-right pr-3 exit-conf"
                                                    style="font-size: 30px;cursor: pointer;">
                                                    &times;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="d-flex" style="font-size: 15px;">
                                                    <div style="width: 20px;height: 20px;" class="mr-2">
                                                        <img class="img-fluid" src="./palette.png" alt="">
                                                    </div>Màu Nền
                                                </td>
                                                <td>
                                                    <ul class="list-color d-flex flex-wrap"
                                                        style="list-style-type: none; box-sizing: border-box;">
                                                        <li class=""><button value="#f5e4e4"
                                                                style="background-color:#f5e4e4 ;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        <li class=""><button value="#f5ebcd"
                                                                style="background-color:#f5ebcd ;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        <li class=""><button value="#e2eee2"
                                                                style="background-color:#e2eee2 ;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        <li class=""><button value="#e1e8e8"
                                                                style="background-color:#e1e8e8 ;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        <li class=""><button value="#eae4d3"
                                                                style="background-color:#eae4d3;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                        <li class=""><button value="#e5e3df"
                                                                style="background-color:#e5e3df ;"
                                                                class="btn mr-3  btn-md color-userBuyIt"></button></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="">
                                                    <div class="d-flex align-userBuyIts-center" style="font-size: 15px;">
                                                        <i class="fa fa-font mr-2" aria-hidden="true"
                                                            style="font-size: 20px !important;"></i>
                                                        Font Chữ
                                                    </div>
                                                </td>
                                                <td>
                                                    <select name="" class="select font-read" id="">
                                                        <option value="Arial">Arial</option>
                                                        <option value="Roboto">Roboto</option>
                                                        <option value="Times New Roman">Times New Roman</option>
                                                        <option value="Tahoma">Tahoma</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-userBuyIts-center" style="font-size: 15px;">
                                                        <i class="fa fa-text-height mr-2" aria-hidden="true"
                                                            style="font-size: 20px !important;"></i>
                                                        Cỡ Chữ
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <button
                                                            onclick="btnRemove('watch-content','fontSize-number','font-size',1,20,'px')"
                                                            class="btn removeNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center1 fa fa-minus"
                                                                aria-hidden="true"></i>
                                                        </button>
                                                        <div class="d-flex justify-content-start align-userBuyIts-center">

                                                            <p class="fontSize-number" style="margin: 0;">20</p>
                                                            <p style="margin: 0;">px</p>
                                                        </div>
                                                        <button onclick="btnAdd('fontSize-number','font-size',1,30,'px')"
                                                            class="btn addNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                aria-hidden="true"></i>

                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-userBuyIts-center" style="font-size: 15px;">
                                                        <i class="fa fa-arrows-h mr-2" aria-hidden="true"
                                                            style="font-size: 20px !important;"></i>
                                                        Chiều Rộng Khung
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <button
                                                            onclick="btnRemove('main-read','watchSize-box','width',100,700)"
                                                            class="btn addNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center fa fa-minus"
                                                                aria-hidden="true"></i>

                                                        </button>
                                                        <div class="d-flex justify-content-start align-userBuyIts-center">
                                                            <p class="watchSize-box" style="margin: 0;">700</p>
                                                            <p style="margin: 0;">px</p>
                                                        </div>
                                                        <button onclick="btnAdd('watchSize-box','width',100 ,1000)"
                                                            class="btn addNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                aria-hidden="true"></i>

                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-userBuyIts-center" style="font-size: 15px;">
                                                        <i class="fa fa-arrows-v mr-2" aria-hidden="true"
                                                            style="font-size: 20px !important;"></i>
                                                        Giãn Dòng
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-around">
                                                        <button
                                                            onclick="btnRemove('watch-content','watchSize-height','line-height',10,100,'%')"
                                                            class="btn addNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center1 fa fa-minus"
                                                                aria-hidden="true"></i>

                                                        </button>
                                                        <div class="d-flex justify-content-start align-userBuyIts-center">
                                                            <p class="watchSize-height" style="margin: 0;">100</p>
                                                            <p style="margin: 0;">%</p>
                                                        </div>
                                                        <button
                                                            onclick="btnAdd('watchSize-height','line-height',10,200,'%')"
                                                            class="btn addNumber shadow-none">
                                                            <i style="font-size: 20px;"
                                                                class="p-1 d-flex align-userBuyIts-center fa fa-plus"
                                                                aria-hidden="true"></i>

                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </li>
                                <li class="d-flex align-userBuyIts-center"><button id="mark"
                                        class="btn mt-2 shadow-none btn-watch-widget"><i class="fa fa-bookmark-o"
                                            aria-hidden="true"></i>
                                    </button></li>
                                <li class="d-flex align-userBuyIts-center"><button
                                        class="btn mt-2 shadow-none btn-watch-widget"><i class="fa fa-comments-o"
                                            aria-hidden="true"></i>
                                    </button></li>
                            </ul>
                        </div>


                        <div class="paginate">

                            <div class="row">

                                <a href="#" style="font-size: 25px;font-weight: bold;border: 1px solid #2222;"
                                    class="prev-chapter px-3 py-1 mb-4 text-left col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                    Chương Trước
                                </a>


                                <a href="watch/{{ $product->alias }}/{{ $product->id - 1 }}"
                                    style="font-size: 25px;font-weight: bold;border: 1px solid #2222;"
                                    class="next-chapter px-3 py-1 mb-4 text-right col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                    Chương Sau
                                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                </a>

                            </div>

                        </div>

                        <div class="comment">
                            <div style="font-size: 20px;" class="comment-head d-flex align-userBuyIts-start flex-column">
                                <div class="d-flex justify-content-between w-100">
                                    <p class="cmt-count"><span id="quantity" class="mr-1"></span> Bình
                                        Luận</p>
                                    <div class="dropdown">
                                        <button type="button"
                                            style="background:none;border: none;color: #000;font-weight: 400;outline: none !important"
                                            class=" dropdown-toggle p-0 shadow-none" data-toggle="dropdown">
                                            Mới Cập Nhật
                                        </button>
                                        <div style="outline: none !important;;" class="dropdown-menu shadow-none">
                                            <a class="dropdown-userBuyIt shadow-none" href="#">Mới Cập
                                                Nhật</a>
                                            <a class="dropdown-userBuyIt shadow-none" href="#">Mới Đăng</a>
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
                                        <div class="w-100 d-flex align-userBuyIts-center" style="position: relative;">
                                            <textarea class="box-comment w-100 px-3 py-2" placeholder="Nhập Bình Luận Tại Đây..." name="" id="boxComment" cols="30"
                                                rows="2"></textarea>
                                            <div class="h-100 comment-send">
                                                <button class="btn btn-default btn-comment h-100"
                                                    style="box-shadow: none;background: none"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i>
                                                </button>

                                            </div>

                                        </div>


                                    </div>


                                </div>
                                <div class="comment-v mt-4 pb-2 w-100 d-flex align-userBuyIts-start row">
                                    @foreach ($comments as $comment)
                                        <div style="border-bottom: 1px solid #eee;"
                                            class="col-lg-12 col-md-12 col-sm-12 d-flex align-userBuyIts-start mt-2">
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
                @endif
            @endif

        </main>
    </div>
@endsection
@section('js')
    <script>
        window.addEventListener('scroll', function(e) {
            let right = 20;
            let watchWidget = document.querySelector('.watch-widget');
            let mainRead = document.querySelector('.main-read');

            let scrollY = window.scrollY;
            // console.log(scrollY);
            let header = document.querySelector('.header');
            if (scrollY > header.clientHeight) {
                watchWidget.classList.add('widget-active')
            } else {
                watchWidget.classList.remove('widget-active')
            }
            if (scrollY > mainRead.clientHeight - 200) {
                watchWidget.classList.remove('widget-active')
            }
        });







        // Comment

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
                                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex align-userBuyIts-start mt-2">
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
