<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Evaluasi Diri</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::Asset('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid" id="top-navbar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto" id="left-menu">
                      <li class="nav-item active">
                        <button type="button" id="sidebarCollapse" class="btn btn-light">
                            <i class='fas fa-grip-lines' style='color:#808080'></i>
                        </button>
                      </li>
                      @yield('top-navbar')
                    </ul>
                    <ul class="navbar-nav ml-auto" id="right-menu">
                        <li class="nav-item">
                            <img src="{{ URL::asset('images/logo4.png') }}" width="100px" height="40px">
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('home_admin') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F2A93A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('ketersediaan') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Ketersediaan</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('sunting_pengguna') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Pengguna</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('sunting_mitra') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Mitra</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('logout') }}" style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="text-left">
            <h2> Selamat datang {{Auth::user()->name}} </h2>
            <li class="text-left">
                <img src="{{ URL::asset('images/homepic.png') }}" width="200px" height="255px">
            </li>
        </div>
    </body>
</html>