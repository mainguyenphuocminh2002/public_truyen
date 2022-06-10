@extends('Admin.Layouts.adminLayout');

@section('title')
    Sản Phẩm
@endsection

@section('adminCss')
    <style>
        input[type=file]::file-selector-button {
            background: none;
            border: none;
            content: 'Chọn Hình';
        }

    </style>
@endsection

@php
use App\Helper\Common;
$user = auth()->user();
@endphp

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Sản phẩm</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tạo sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form method="POST" action="{{ route('products.update', ['product' => Common::changeIdToEncode($id)]) }}"
                id="create_product" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session('type'))
                                    <x-alert type="{{ session('type') }}" message="{{ session('message') }}"></x-alert>
                                @endif
                                <div class="form-group ">
                                    <label>Tên sản phẩm:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" value="{{ old('name') ?? $product->name }}" class="form-control"
                                        id="title" required name="name">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục sản phẩm:</label>
                                    @error('categorys')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <select name="categorys[]" multiple class="select custom-select" required>
                                        @foreach ($categorys as $category)
                                            <option
                                                {{ $categoryChooses->contains('id', $category->id) ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tác giả:</label>
                                    @error('author')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <select name="author" class="select">
                                        @foreach ($authors as $author)
                                            <option {{ $authorChoose->contains('id', $author->id) ? 'selected' : '' }}
                                                value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Thumbnail:</label>
                                    <p>(Kích Thước: 210x280, Cho Phép:jpg, jpeg)</p>
                                    @error('thumbnail')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <label for="formFileDisabled" class="form-label"></label>
                                    <img style="width: 200px;height: 200px;" src="{{asset('admin/img/avatar-default.png')}}" id="productImg"
                                        alt="">
                                    <input onchange="BrowseServer('formFileDisabled','productImg','{{ csrf_token() }}','{{ $user->name }}')" class="form-control" name="image" type="file" id="formFileDisabled" />
                                </div>

                                <div class="form-group">
                                    <label>Mô tả chi tiết:</label>
                                    @error('description')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    {{-- <div id="editorContent"></div> --}}
                                    <textarea name="description" id="editorContent" cols="30" rows="10">{{ old('description') ?? $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Lượt Xem:</label>
                                    @error('views')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" value="{{ old('views') ?? $product->view }}"
                                        class="form-control" id="title" required name="views">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="create_product" class="btn btn-block btn-primary btn-lg">Đăng sản
                            phẩm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('adminJs')
    <script>
        $(document).ready(function() {
            CKEDITOR.replace("editorContent", {
                // filebrowserImageUploadUrl: "{{ url('api/uploads-ckeditor?_token=' . csrf_token()) }}",
                // filebrowserBrowseUrl: "{{ url('api/file-browser?_token=' . csrf_token()) }}",
                // filebrowserUploadMethod: 'form'
            })
        });
    </script>
@endsection
