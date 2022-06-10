@extends('Admin.Layouts.adminLayout');
@section('adminTitle')
    TEST
@endsection

@php
use App\Helper\Common;
use App\Models\User;

@endphp

@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Thành viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh sách thành viên</li>
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
                            <div class="table-responsive" id='user_list'>
                                <table class="table table-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Id</th>
                                            <th>Thành viên</th>
                                            <th>Email</th>
                                            <th>Ngày đăng ký</th>
                                            <th>Trạng thái</th>
                                            <th class="text-right">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($users))
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="id"><?= $user->id ?></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="#" class="avatar avatar-sm mr-2"><img
                                                                    class="avatar-img rounded-circle"
                                                                    src="{{ $user->avatar == null ? asset('admin/img/avatar-default.png') : asset($user->avatar) }}"
                                                                    alt="User Image" /></a>
                                                            <a href="#">
                                                                <span style="text-transform: capitalize"
                                                                    class="title">
                                                                    {{ $user->name ?? 'Unknowed' }}</span>
                                                        </h2>
                                                    </td>
                                                    <td> {{ $user->email }}</td>
                                                    <td>{{ $user->created_at }}</td>
                                                    <td class="status">
                                                        <span
                                                            class="badge-pill <?= $user->email_verified_at !== null ? 'bg-success-light' : 'bg-danger-light' ?>">
                                                            <?= $user->email_verified_at !== null ? 'Đã xác minh' : 'Chưa xác minh' ?></span>
                                                    </td>

                                                    <td class="text-right">

                                                        {{-- @can('updateUser', User::class) --}}
                                                            <a href="{{ route('users.edit', [Common::changeIdToEncode($user->id)]) }}"
                                                                class="btn btn-sm btn-white text-success mr-2"><i
                                                                    class="far fa-edit mr-1"></i> Sửa</a>
                                                        {{-- @endcan --}}
                                                        {{-- @can('deleteUser', User::class) --}}
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
                        url: "users/" + id,
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
