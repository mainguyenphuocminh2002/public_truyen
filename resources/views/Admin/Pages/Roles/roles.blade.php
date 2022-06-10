@extends('Admin.Layouts.adminLayout');
@section('adminTitle')
    TEST
@endsection

@php
use App\Helper\Common;
use App\Models\Admin\Roles;

@endphp

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Vai Trò</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh Sách Vai Trò</li>
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
                            <div class="table-responsive" id='roles_list'>
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Vai Trò</th>
                                            <th>Mô Tả</th>
                                            <th>Ngày đăng ký</th>
                                            <th class="text-right">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($roles))
                                            @foreach ($roles as $role)
                                                <tr>
                                                    <td class="id"><?= $role->id ?></td>
                                                    <td> {{ $role->name }}</td>
                                                    <td> {{ $role->description }}</td>
                                                    <td>{{ $role->created_at }}</td>
                                                    <td class="text-right">
                                                        @can('updateRoles', Roles::class)
                                                            <a href="{{ route('roles.edit', ['role' => Common::changeIdToEncode($role->id)]) }}"
                                                                class="btn btn-sm btn-white text-success mr-2"><i
                                                                    class="far fa-edit mr-1"></i> Sửa</a>
                                                        @endcan
                                                        @can('deleteRoles', Roles::class)

                                                        <button type="button"
                                                        class="btn btn-sm btn-white text-danger mr-2 delete"><i
                                                        class="far fa-trash-alt mr-1"></i>Xóa</button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="quick_view_user" class="modal custom-modal fade bd-example-modal-lg" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body" style=" padding: 0; ">
                </div>
            </div>
        </div>
    </div>
    <!-- Chart JS -->
    <script src="{{ asset('admin/plugins/apexchart/apexcharts.min.js') }}"></script>
@endsection
@section('adminJs')
    <script>
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
                        url: "roles/" + id,
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
                    if (result.value == 1) {
                        var table = $(".datatable").DataTable();
                        table.row(dtRow).remove().draw(false);
                        Swal.fire({
                            title: "Xóa thành công",
                            text: `Bạn đã xoá ${item} '${title}'`,
                            icon: "success",
                        });
                    } else {
                        Swal.fire({
                            title: "Xóa không thành công",
                            text: `Đã có lỗi khi xoá ${item} '${title}'`,
                            icon: "error",
                        });
                    }
                }
            });
        }
    </script>
@endsection
