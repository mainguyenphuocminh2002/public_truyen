@extends('Admin.Layouts.adminLayout')
@section('title')
    CREATE
@endsection
@php
    use App\Helper\Common;
@endphp
@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Quyền</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Sửa Quyền</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form method="POST" action="{{ route('permissions.update',['permission'=>Common::changeIdToEncode($id)]) }}" id="create_user" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-lg-12 col-md-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Tên Quyền:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ?? $permissionChoose->name }}"
                                        required>
                                </div>
                                <div class="form-group ">
                                    <label>Mô Tả Quyền:</label>
                                    @error('description')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <textarea class="form-control" name="description" cols="30"
                                        rows="10">{{ old('description') ?? 'Mô Tả Quyền' }}</textarea>
                                    @error('permission')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="">Cấp Cha</label>
                                        <select class="select mb-5" name="permission">
                                            <option value="0">Vui Lòng Chọn Quyền</option>
                                            @foreach ($permissions as $permission)
                                                <option {{$parentPermisison->contains('parent_id',$permission->parent_id) ? 'checked' : ''}} value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @foreach ($permissions as $permission)
                                                    @if ($permission->parent_id == 0)
                                                        <label style="font-size: 20px" class="col-12 font-weight-bold">{{ $permission->name }}</label>
                                                    @else
                                                        <div class="col-3 d-flex align-items-center" style="font-size: 16px">
                                                            <input type="checkbox" value="{{$permission->id}}" id="{{$permission->name}}" class="mr-1" name="permissions[]">
                                                            <label class="m-0" for="{{$permission->name}}">
                                                                {{ $permission->name }}
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7 col-md-7">
                                            <div class="form-group ">
                                                <label>Key_Code:</label>
                                                @error('key_code')
                                                    <div class="text-danger text-capitalize">{{ $message }}</div>
                                                @enderror
                                                <input type="text" class="form-control" name="key_code"
                                                    value="{{ old('key_code') ?? $permissionChoose->key_code }}" required>
                                            </div>
                                        </div>
                                        <div style="border-radius: 10px" style="box-sizing: border-box"
                                            class="col-lg-5 col-md-5 mt-3 bg-warning p-2">
                                            <div class="col-12 d-flex justify-content-around flex-column">
                                                <div>
                                                    <h5>Quy Tắc Đặt Key_Code:</h5>
                                                    <p style="color: #000">Ví Dụ:<br>
                                                        -Thể Loại-Xem => ViewCategorys
                                                    </p>
                                                </div>
                                                <div style="color: #000" class="">
                                                    <h5>Tên Module:</h5>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <p>-Products: Sản Phẩm</p>
                                                            <p>-Categorys: Thể Loại</p>
                                                            <p>-Themes: Giao Diện</p>
                                                        </div>
                                                        <div>
                                                            <p>-Users: Tài Khoản</p>
                                                            <p>-Comments: Bình Luận</p>
                                                            <p>-Authors: Tác Giả</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-block btn-primary btn-lg" name="reg_user">Tạo
                                    Quyền</button>
                            </div>
                        </div>




                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
{{-- @section('adminJS') --}}
{{-- <script>
        let timeout;

        // traversing the DOM and getting the input and span using their IDs

        let password = document.getElementById('PassEntry')
        let strengthBadge = document.getElementById('StrengthDisp')

        // The strong and weak password Regex pattern checker

        let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
        let mediumPassword = new RegExp(
            '((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))'
        )

        function StrengthChecker(PasswordParameter) {
            // We then change the badge's color and text based on the password strength

            if (strongPassword.test(PasswordParameter)) {
                strengthBadge.style.backgroundColor = "green"
                strengthBadge.textContent = 'Mạnh'
            } else if (mediumPassword.test(PasswordParameter)) {
                strengthBadge.style.backgroundColor = 'blue'
                strengthBadge.textContent = 'Trung bình'
            } else {
                strengthBadge.style.backgroundColor = 'red'
                strengthBadge.textContent = 'Yếu'
            }
        }

        // Adding an input event listener when a user types to the  password input

        password.addEventListener("input", () => {

            //The badge is hidden by default, so we show it

            strengthBadge.style.display = 'block'
            clearTimeout(timeout);

            //We then call the StrengChecker function as a callback then pass the typed password to it

            timeout = setTimeout(() => StrengthChecker(password.value), 200);

            //Incase a user clears the text, the badge is hidden again

            if (password.value.length !== 0) {
                strengthBadge.style.display != 'block'
            } else {
                strengthBadge.style.display = 'none'
            }
        });
    </script> --}}
{{-- @endsection --}}
