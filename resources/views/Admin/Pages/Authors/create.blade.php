@extends('Admin.Layouts.adminLayout')
@section('title')
    Authors
@endsection

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Tác giả</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Tạo Tác giả</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form method="POST" action="{{route('authors.store')}}" id="create_author" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group ">
                                    <label>Tên Tác giả:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" value="{{old('name') ?? ''}}" class="form-control" id="title" required name="name">
                                    </div>
                                    <button type="submit" name="create_author" class="btn btn-block btn-primary btn-lg">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
