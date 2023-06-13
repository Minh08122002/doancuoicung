<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">
    <title>ĐĂNG NHẬP</title>
    </head>

<body>
    <div style="background-color: #1A9317;height: 200px; text-align: center;">
        <img style="width: 300px;height: 300px;padding-top: 30px;" src="">
    </div>
    <div id="wrapper">
        <form action="{{ route('dang-nhap')}}" method="post" id="form-login">
            @csrf
            <h1 class="form-heading">ĐĂNG NHẬP</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input name="email" class="form-input" placeholder="Email">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input name="password" class="form-input" placeholder="Mật khẩu">
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
    </div>
</body>

</html>
</html>