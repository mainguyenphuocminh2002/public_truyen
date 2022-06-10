@extends('Admin.Layouts.adminLayout');



@section('title')
    Danh Mục
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Categorys;

@endphp

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Danh mục</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-5">
                    <form method="POST" action="{{ route('categorys.store') }}" id="create_category"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-group ">
                                    <label>Tên danh mục:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" id="title" required name="name">
                                    <div class=" invalid-feedback">Vui lòng nhập tên danh mục.</div>
                                </div>
                                <select name="parent_id" class="select">
                                    <label>Cấp Cha</label>
                                    @error('parent_id')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <option value="0">Vui Lòng Chọn Danh Mục</option>
                                    @foreach ($categorys as $category)
                                        @if($category->parent_id === 0)
                                            <option value="{{ Common::changeIdToEncode($category->id) }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <button class="btn btn-primary my-3 w-100">Thêm Danh Mục</button>
                            </div>
                        </div>
                        @can('createUser', Categorys::class)
                            <button type="submit" class="btn btn-block btn-primary btn-lg" name="create_category">Tạo danh
                                mục</button>
                        @endcan
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" id="category_list">
                                <table class="table table-center table-hover ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Ngày tạo</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (isset($categorys))
                                            @foreach ($categorys as $category)
                                                <tr>
                                                    <td class="id">{{ $category->id }}</td>
                                                    <td class="title">{{ $category->name }}</td>
                                                    <td>{{ $category->created_at }}</td>
                                                    <td class="text-right">
                                                        {{-- @can('updateCategorys', Categorys::class) --}}
                                                        <a href="{{ route('categorys.edit', ['category' => Common::changeIdToEncode($category->id)]) }}"
                                                            class="btn btn-sm btn-white text-success mr-2"><i
                                                                class="far fa-edit mr-1"></i>Sửa</a>

                                                        {{-- @endcan --}}
                                                        {{-- @can('deleteCategorys', Categorys::class) --}}
                                                        <a href="{{ route('categorys.destroy', ['category' => Common::changeIdToEncode($category->id)]) }}"
                                                            class="btn btn-sm btn-white text-danger delete"><i
                                                                class="far fa-trash-alt mr-1"></i>Xóa</a>

                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class=" float-right mt-2 mb-3">
                                    {{ $categorys->links() }}
                                </div>
                            </div>
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
        function deleteItem(element, item) {
            let id = element.closest("tr").find(".id").text();
            console.log(id);
            let title = element.closest("tr").find(".title").text();
            title = title ? title : "#" + id;
            var dtRow = element.parents("tr");
            Swal.fire({
                title: `Xóa ${item}`,
                html: `Bạn có muốn xoá ${item} <b style="  text-transform: capitalize;">${title}</b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Không",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "categorys/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        dataType: "JSON",
                        success: function(response) {}
                    });
                },
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload()

                }
            });
        }
    </script>
@endsection
