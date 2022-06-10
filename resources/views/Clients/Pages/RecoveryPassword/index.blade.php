@extends('Clients.layouts.mainLayout')

@section('title')
    Đổi Mật Khẩu
@endsection


@section('content')
    <div class="container py-5">
        <form action="{{route('recoveryPassword')}}" method="post" id="recovery-form">
            @csrf
            <div class="form-group">
                <label for="">Nhập mật khẩu mới</label>
                <input class="form-control" name="new_password" type="password" placeholder="Nhập Mật Khẩu Mới" required>
            </div>
            <div class="form-group">
                <label for="">Nhập lại mật khẩu mới</label>
                <input class="form-control" name="password_confirm" type="password" placeholder="Nhập Lại Mật Khẩu"
                    required>
            </div>
            <div class="text-center" style="margin-top: 1rem">
                <button type="submit" form="recovery-form" class="btn btn-primary btn-lg">
                    Đổi Mật Khẩu
                </button>
            </div>
        </form>
    </div>
@endsection
