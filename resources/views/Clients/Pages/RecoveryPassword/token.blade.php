@extends('Clients.layouts.mainLayout')

@section('title')
    Đổi Mật Khẩu
@endsection


@section('content')
    <div class="container py-5">
        <form action="{{route('checkToken')}}" method="post" id="recovery-form">
            @csrf
            <div class="form-group">
                <label for="">Nhập Mã Bảo Mật</label>
                <input class="form-control" name="token" type="text" placeholder="Nhập Mã Bảo Mật" required>
            </div>
            <div class="text-center" style="margin-top: 1rem">
                <button type="submit" form="recovery-form" class="btn btn-primary btn-lg">
                    Đổi Mật Khẩu
                </button>
            </div>
        </form>
    </div>
@endsection
