@extends('Admin.Layouts.adminLayout')
@section('title')
    Update
@endsection
@php
    use App\Helper\Common;
    Common::changeIdToEncode($id);
@endphp
@section('adminContent')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Thành viên</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Sửa thành viên</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <form method="POST"  action="{{ route('users.update',['user'=>Common::changeIdToEncode($id)])}}" id="create_user" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="thumbnail-upload">
                                        <div class="thumbnail-edit">
                                            <input type="file" id="thumbnail" name="avatar" />
                                            <label for="thumbnail"><i class="fas fa-pencil-alt"></i></label>
                                        </div>
                                        <div class="thumbnail-preview">
                                            <div id="thumbnailPreview"
                                                style="background-image: url('{{ asset($user->avatar) }}')">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">Allowed *.jpeg, *.jpg, *.png,<br> max size of 3.1 MB</p>
                                    @error('avatar')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label>Vai trò:</label>
                                    @error('roles')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <select multiple="multiple" class="select select-role" name="roles[]">
                                        @foreach ($roles as $role)
                                            <option {{$roleOfUser->contains($role->id) ? 'selected' : null}} value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group ">
                                    <label>Tên đăng nhập:</label>
                                    @error('name')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name') ?? $user->name }}" required>
                                </div>
                                @error('email')
                                    <div class="text-danger text-capitalize">{{ $message }}</div>
                                @enderror
                                @error('phone')
                                    <div class="text-danger text-capitalize">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email"
                                              readonly  value="{{ old('email') ?? $user->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label>Phone:</label>
                                            <input type="text" class="form-control" name="phone"
                                              readonly  value="{{ old('phone') ?? $user->phone }}">

                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label class="d-block">Giới tính:</label>
                                    @error('gender')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_male"
                                            value="0" {{$user->gender === 0 ? 'checked' : null}}>
                                        <label class="form-check-label" for="gender_male">Nam</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender_female"
                                            value="1" {{$user->gender === 1 ? 'checked' : null}}>
                                        <label class="form-check-label" for="gender_female">Nữ</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label>Mật khẩu</label>
                                    @error('password')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="password"
                                            id="PassEntry" required>
                                        <span class="fas fa-eye toggle-password"></span>
                                        <div class=" invalid-feedback">Vui lòng nhập mật khẩu.</div>
                                    </div>
                                    <span id="StrengthDisp" class="badge displayBadge">Weak</span>
                                </div>
                                <div class="form-group ">
                                    <label>Nhập lại mật khẩu</label>
                                    @error('re_password')
                                        <div class="text-danger text-capitalize">{{ $message }}</div>
                                    @enderror
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="re_password"
                                            id="re_password" required>
                                        <div class=" invalid-feedback">Vui lòng nhập lại mật khẩu.</div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary btn-lg" name="reg_user">Tạo thành
                                    viên</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('adminJs')
{{-- <script>
    $(document).ready(function() {
        $('.select-role').select2();
    });
</script> --}}
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
@endsection
