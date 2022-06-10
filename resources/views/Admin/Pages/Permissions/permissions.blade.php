@extends('Admin.Layouts.adminLayout');
@section('adminTitle')
    TEST
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Permissions;

@endphp

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Quyền</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh Sách Quyền</li>
                        </ul>
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
                            <div class="table-responsive" id='permissions_list'>
                                <table class="table table-center table-hover ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Quyền</th>
                                            <th>Key_Code</th>
                                            <th>Mô Tả</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th class="text-right">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($permissions))
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                    <td class="id">{{ $permission->id }}</td>
                                                    <td> {{ $permission->name }}</td>
                                                    <td> {{ $permission->key_code }}</td>
                                                    <td> {{ $permission->description }}</td>
                                                    <td>{{ $permission->created_at }}</td>
                                                    <td>{{ $permission->updated_at }}</td>
                                                    <td class="text-right">
                                                        @can('updatePermissions', Permissions::class)
                                                            <a href="{{ route('permissions.edit', ['permission' => Common::changeIdToEncode($permission->id)]) }}"
                                                                class="btn btn-sm btn-white text-success mr-2"><i
                                                                    class="far fa-edit mr-1"></i> Sửa</a>
                                                        @endcan
                                                        {{-- @can('deletePermissions', Permissions::class) --}}

                                                        <button type="button"
                                                            class="btn btn-sm btn-white text-danger mr-2 delete"><i
                                                                class="far fa-trash-alt mr-1"></i>Xóa</button>
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class=" float-right mt-2 mb-3">
                                    {{ $permissions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Chart JS -->
    <script src="{{ asset('admin/plugins/apexchart/apexcharts.min.js') }}"></script>
@endsection
@section('adminJs')
    <script>
        // pagination



        function deleteItem(element, item) {
            let id = element.closest("tr").find(".id").text();
            let title = element.closest("tr").find(".title").text();
            title = title ? title : "#" + id;
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
                        url: "permissions/" + id,
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
                    // location.reload()
                }
            });
        }
    </script>
@endsection
