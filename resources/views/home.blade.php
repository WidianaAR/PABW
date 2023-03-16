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
                            <img src="{{ URL::asset('images/logo2.png') }}" width="100px" height="40px">
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('logout') }}" style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="text-center">
            <h2> Selamat datang {{Auth::user()->name}} </h2>
        </div>
    </body>
</html>