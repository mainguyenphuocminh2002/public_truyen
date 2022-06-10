@extends('Clients.layouts.mainLayout')

@section('css')
    <link rel="stylesheet" href="{{ asset('Clients/css/category/main.css') }}">
@endsection

@section('font')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
@endsection
@php

use App\Helper\Common;
use App\Models\Admin\Authors;
use App\Models\Admin\Products;
$productClass = new Products();
@endphp
@section('content')
    <a href="#" class="banner">
        <span
            style='background-image: url("https://static.cdnno.com/storage/topbox/d40cd3310c03819136b438c9fc9455e4.jpg");'></span>
    </a>
    <main class="main mb-4">
        <div class="container">
            <div class="page-content mt-5">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <div class="choose box-ui">
                            <h6 style="font-weight: bold;">Đã Chọn</h6>
                            <div class="d-flex flex-wrap box-choose">
                                @if (isset($categoryChooses))
                                    @foreach ($categoryChooses as $categoryChoose)
                                        <div data-id={{ $categoryChoose->id }}
                                            class="mr-2 mb-2 box-ui-btn btn-choose category-{{ $categoryChoose->id }}">
                                            {{ $categoryChoose->name }}<span data-id="{{ $categoryChoose->id }}"
                                                style="cursor: pointer;" class="exit-category ml-1">&times;</span></div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="categorys box-ui mt-3 d-flex flex-wrap">
                            @foreach ($categorys as $category)
                                @if ($category->parent_id === 0)
                                    <h6 style="font-weight: bold;flex-basis: 100%;">Thể Loại</h6>
                                @else
                                    @if (isset($id) && $id->contains($category->id))
                                        <div style="background-color: #666;color: #fff" data-id="{{ $category->id }}"
                                            class="mr-2 mb-2 box-ui-btn btn-category" class="btn btn-primary btn-sm">
                                            {{ $category->name }}</div>
                                    @else
                                        <div data-id="{{ $category->id }}" class="mr-2 mb-2 box-ui-btn btn-category"
                                            class="btn btn-primary btn-sm">
                                            {{ $category->name }}</div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>


                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="widget">

                            <ul class="list-widget d-flex flex-wrap align-items-center">
                                <li>
                                    <div style="box-shadow: none" class="dropdown shadow-none">
                                        <button type="button"
                                            style="background:none;border: none;color: #000;font-weight: 400;outline: none !important"
                                            class=" dropdown-toggle p-0 shadow-none" data-toggle="dropdown">
                                            Mới Cập Nhật
                                        </button>
                                        <div style="box-shadow: none" class="dropdown-menu shadow-none">
                                            <a class="dropdown-item shadow-none" href="{{route('Clients.categorys.newUpdate')}}">Mới Cập Nhật</a>
                                            <a class="dropdown-item shadow-none" href="{{route('Clients.categorys.newCreate')}}">Mới Đăng</a>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="{{route('Clients.categorys.highView')}}" class="widget-link">Lượt Đọc</a></li>
                                <li><a href="{{route('Clients.categorys.favorites')}}" class="widget-link">Cất Giữ</a></li>
                                <li><a href="{{route('Clients.categorys.comments')}}" class="widget-link">Bình Luận</a></li>
                                <li><a href="{{route('Clients.categorys.quantityChapter')}}" class="widget-link">Số Chương</a></li>
                            </ul>

                        </div>


                        <div class="row">
                                @if (!$products->isEmpty())
                                    @foreach ($products as $product)
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            <div class="product">
                                                <a href="{{ route('Clients.detail', ['alias'=>$product->alias]) }}" style="color: #000;" class="d-flex py-3 product-item">
                                                    <div class="row">
                                                        <div class="col-lg-3">
    
                                                            <img style="width: 90px;height: 120px;"
                                                                src='{{ asset("$product->thumbnail") }}' id="thumbnail"
                                                                alt="Image">
    
                                                        </div>

                                                        <div class="col-lg-9" style="word-break: break-word;">
    
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
                                                                        {{$product->chapters }}
                                                                    </div>
                                                                    <span class="ml-1">
                                                                        Chương
                                                                    </span>
                                                                </footer>
                                                            </div>
    
                                                        </div>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-center w-100 h-100 mt-5" style="font-size: 30px;">Không Có Truyện Phù Hợp
                                        !!!</p>
                                @endif

                        </div>
                        @if (!$products->isEmpty())
                            <div class="mt-3 float-right">
                                {{ $products->links() }}
                            </div>
                        @endif

                    </div>

                </div>
            </div>

        </div>

    </main>
@endsection
@section('js')
    <script>
        $('.btn-category').on('click', function() {
            let value = $(this).data().id;
            if ($(`.category-${value}`).length >= 1) {
                return false
            }
            let text = $(this).text();
            let box = $('.box-choose');
            let html = `
        <div data-id=${value} class="mr-2 mb-2 box-ui-btn btn-choose category-${value}"
        >${text}<span data-id="${value}" style="cursor: pointer;"
        class="exit-category ml-1">&times;</span></div>
        `;
            box.append(html);
            // console.log($(location).attr('href') + '/' + value);
            $(this).css('background-color', '#666')
            $(this).css('color', '#fff')

            let url = window.location.href
            btn = $('.btn-choose');
            let list = [];
            $.each(btn, function(indexInArray, val) {
                list.push(val.dataset.id)
            });
            let check = url.split('categorys?page=');
            if (check.length >= 2) {
                check = check.slice(0, 1);
                url = check + 'categorys/'
            }
            let makeUrl = url.split('categorys');
            makeUrl = makeUrl.slice(0, 1);
            makeUrl += 'categorys/'
            if (list.length >= 2) {
                list.forEach((element, i) => {
                    if (i >= 1) {
                        makeUrl += 'C' + element
                    } else {
                        makeUrl += element
                    }
                });
                window.location = makeUrl
            } else {
                makeUrl += value;
                window.location = makeUrl
            }


            $('.exit-category').on('click', function() {
                let parent = $(this).data().id;
                $('div').remove('.category-' + parent)
                $('.btn-category').css('color', '#000')
                $('.btn-category').css('background-color', '#fff')


            })
        })
        $('.exit-category').on('click', function() {
            let parent = $(this).data().id;
            $('div').remove('.category-' + parent)
            let url = window.location.href
            btn = $('.btn-choose');
            let list = [];
            let makeUrl = url.split('categorys/');
            makeUrl = makeUrl.slice(0, 1);
            $.each(btn, function(indexInArray, val) {
                list.push(val.dataset.id)
            });
            makeUrl += 'categorys/';
            if (list.length >= 2) {
                list.forEach((element, i) => {
                    if (i >= 1) {
                        makeUrl += 'C' + element
                    } else {
                        makeUrl += element
                    }
                });
            } else {
                if (btn.length !== 0) {
                    makeUrl += btn.data().id;
                }
            }
            window.location = makeUrl

        })
    </script>
@endsection
