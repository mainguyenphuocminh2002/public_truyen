@extends('Admin.Layouts.adminLayout')

@php
use App\Helper\Common;

@endphp

@section('title')
    Danh Mục
@endsection

@section('adminContent')


    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Danh mục</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Sửa danh mục sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row ">
                <div class="col-md-12">
                    <form method="POST" action={{route('categorys.update',['category' =>  Common::changeIdToEncode($id)])}} id="edit_category" class="needs-validation" novalidate>
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Tên danh mục:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" id="title" required name="name"
                                        value="{{$category->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Cấp Cha</label>
                                    <select name="parent_id" class="select">
                                        @error('parent_id')
                                            <div class="text-danger text-capitalize">{{ $message }}</div>
                                        @enderror
                                        <option value="0">Vui Lòng Chọn Danh Mục</option>
                                        @foreach ($categorys as $category)
                                            @if ($category->parent_id === 0)
                                                <option {{$categoryChoose->contains('parent_id',$category->id) ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary btn-lg" name="edit_category">Sửa danh
                            mục</button>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
