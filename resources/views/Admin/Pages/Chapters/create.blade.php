@extends('Admin.Layouts.adminLayout')
@section('title')
    Chapters
@endsection

@section('adminCss')
    <style>
        .price_form {
            display: none
        }

        .check_price:checked~.price_form {
            display: block;
        }

    </style>
@endsection

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Chương Truyện</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tạo Chương Truyện</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form method="POST" action="{{ route('chapters.store') }}" id="create_author" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label for="">Truyện</label>
                                    @error('product_id')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <select name="product_id" class="select">
                                        <option value="">Vui Lòng Chọn Truyện</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ $product->id == old('product_id') ? 'selected' : '' }}>
                                                {{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu Đề</label>
                                    <input type="text" class="form-control pl-3" value="{{ old('title') }}"
                                        placeholder="Nhập Tiêu Đề Chương Truyện ..." name="title">
                                </div>
                                <div class="form-group">
                                    @error('price')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="d-flex flex-wrap">
                                        <label for="check1" class="pr-4" style="min-width: 15px">Giá</label>
                                        <input type="checkbox" class="form-check-input position-relative check_price"
                                            id="check1">
                                        <input type="text" id="" class="form-control pl-3 price_form"
                                            placeholder="Nhập Giá Chương Truyện ..." name="price">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="">Nội Dung</label>
                                    @error('content')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <textarea name="content" id="editorContent" cols="30" rows="10">{{ old('content') ?? '' }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Lưu</button>

                            </div>
                        </div>
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
