<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('Clients/css/bs4/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center py-5">
        <div class="card" style="width:600px">
            <div class="card-body text-center">
              <h1 class="card-title">Xin Chào:{{$name}} </h1>
              <h4>Email:{{$email}} </h4>
              <p class="card-text">Dưới đây là token được dùng để đặt lại mật khẩu <i>Hiệu lực 5 phút</i></p>
              <b style="font-size: 30px;" class="">{{$token}}</b>
            </div>
          </div>
    </div>
</body>
</html>