@extends('Admin.Layouts.adminLayout')
@section('title')
    Authors
@endsection
@php
use App\Helper\Common;
use App\Models\Admin\Chapters;

@endphp
@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">

                    <div class="col-lg-6">
                        <h3 class="page-title">Truyện</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh sách Truyện</li>
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <a href="{{ route('chapters.create') }}" class="float-right btn btn-primary">
                            <i class="fa fa-plus"></i>
                            Thêm Chương Truyện
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->

            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive" id="chapters_list">
                                <table class="table table-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Truyện</th>
                                            <th>Tên Tác Giả</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    @if (isset($chapters))
                                        <tbody>
                                            @foreach ($chapters as $chapter)
                                                <tr>
                                                    <td class="id">{{ $chapter->id }}</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            {{ $product->name }}
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            {{ $author->name }}
                                                        </h2>
                                                    </td>
                                                    <td class="text-right">
                                                        @can('updateChapters', [Chapters::class,$product])
                                                            <a href="{{ route('chapters.edit', ['chapter' => Common::changeIdToEncode($chapter->id)]) }}"
                                                                class="btn btn-sm btn-white text-success mr-2"><i
                                                                    class="far fa-edit mr-1"></i>Sửa</a>
                                                        @endcan
                                                        @can('deleteChapters', [Chapters::class,$product])
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-sm btn-white text-danger delete"><i
                                                                    class="far fa-trash-alt mr-1"></i>Xóa</a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                </table>
                                <div class=" float-right mt-2 mb-3 mr-3">
                                    {{ $chapters->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminJs')
    <script>
        // pagination



        function deleteItem(element, item) {
            let id = element.closest("tr").find(".id").text();
            let title = element.closest("tr").find(".title").text();
            title = title ? title : "#" + id;
            console.log(id);
            var dtRow = element.parents("tr");
            Swal.fire({
                title: `Xóa ${item}`,
                html: `Bạn có muốn xoá ${item} <b>${title}</b>`,
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
                        url: '/admin/chapters/' + id,
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
