<form method="POST" action="{{ route('resetPassword') }}">
    @csrf
    <div class="container">
        <div class="form-group">
            <label for="">Email</label>
            <input name="email" type="email" placeholder="Vui Lòng Nhập Email..." style="border-radius: 20px;"
                class="form-control">
        </div>
        <div class="form-group pb-3 text-center">

            <button type="submit" class="btn btn-primary btn-md btn-sign-in">Lấy Lại Mật Khẩu</button>

        </div>
    </div>
</form>
