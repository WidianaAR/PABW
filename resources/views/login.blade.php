<!DOCTYPE html>
<html>

<head>
    <title>4TELS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ URL::asset('css/app.css') }}" rel='stylesheet'>
</head>

<body>
    @error('login_gagal')
        <div class="alert alert-danger" role="alert" id="msg-box">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ $message }}
        </div>
    @enderror
    <div class="d-flex align-items-center flex-wrap" id="login-bg">
        <div class="container-fluid">
            <div class="login-box">
                <div class="login-left">
                    <img src="{{ URL::asset('images/logo.png') }}" width="100%" height="100%">
                </div>
                <div class="login-right">
                    <h2 style="color: #F2A93A">WELCOME !</h2>
                    <p class="bold">Silahkan login terlebih dahulu</p>
                    <form action="{{ route('login_action') }}" method="POST">
                        @csrf
                        <input id="email" class="login-form" type="email" name="email" placeholder="Email">
                        <input class="login-form" type="password" name="password" placeholder="Password">
                        <input class="orange-button" type="submit" value="Login" style="margin-top: 7%">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
