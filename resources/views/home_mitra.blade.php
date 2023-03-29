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
                            <img src="{{ URL::asset('images/logo3.png') }}" width="100px" height="40px">
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('home_mitra') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F67C55 ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('status') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Booking Status</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="text-left">
            <h2> Selamat datang {{Auth::user()->name}} </h2>
            <div>
                <img src="{{ URL::asset('images/homepic.png') }}" width="200px" height="255px">
            </div>
            <h4> Jumlah saldo Anda: </h4>
            <div>
                <a type="container" style="background: #ffffff; border-radius: 45px; height: 40px; width: 200px; color: rgb(24, 24, 24); display: flex; flex-direction: row; justify-content: center; align-items: center; border: 2px solid #F67C55; padding: 18px 24px;">1000000</a>
            </div>
        </div>
        <div class="text-left">
            <h2> Kamar Hotel</h2>
            <h2> Tambahkan</h2>
            <h2> Kamar Hotel Anda</h2>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Tambah</a>
        </div>
        <div class="table">
            <title>Template Tabel 4Tels</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
            <style>
                table, th, td {
                    border: 3px solid white;
                }
    
                tr.head {
                    background-color: F67C55;
                    color: white;
                }
    
                tr.body-light {
                    background-color: #E8F3EE;
                }
    
                tr.body-dark {
                    background-color: #ff94703d;
                }
    
                .tombol {
                    background: #F67C55;
                    border-radius: 50px;
                    color: white;
                }
    
                .tombol:hover {
                    background: #b55e41;
                    color: white;
                }
            </style>
        </head>
        <body>
            <table class="table text-center">
                <thead>
                    <tr class="head">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jumlah Kamar</th>
                        <th scope="col">Harga per Checkin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="body-dark">
                        <td>1</td>
                        <td>Username</td>
                        <td>Jl.Sultan Hasanuddin</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    <tr class="body-light">
                        <td>2</td>
                        <td>Username 2</td>
                        <td>Jl.Sultan Hasanuddin 2</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    <tr class="body-dark">
                        <td>3</td>
                        <td>Username 3</td>
                        <td>Jl.Sultan Hasanuddin 3</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                </tbody>
            </table>
        </body>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
        <div class="text-left">
            <h2> Tiket Penerbangan</h2>
            <h2> Tambahkan Schedule</h2>
            <h2> Kamar Hotel Anda</h2>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Tambah</a>
        </div>
        <div class="table">
            <title>Template Tabel 4Tels</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
            <style>
                table, th, td {
                    border: 3px solid white;
                }
    
                tr.head {
                    background-color: #F67C55;
                    color: white;
                }
    
                tr.body-light {
                    background-color: #E8F3EE;
                }
    
                tr.body-dark {
                    background-color: #ff94703d;
                }
    
                .tombol {
                    background: #F67C55;
                    border-radius: 50px;
                    color: white;
                }
    
                .tombol:hover {
                    background: #b55e41;
                    color: white;
                }
            </style>
        </head>
        <body>
            <table class="table text-center">
                <thead>
                    <tr class="head">
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Waktu WITA</th>
                        <th scope="col">Jumlah Kursi</th>
                        <th scope="col">Harga Ekonomi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="body-dark">
                        <td>1</td>
                        <td>Username</td>
                        <td>Jl.Sultan Hasanuddin</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    <tr class="body-light">
                        <td>2</td>
                        <td>Username 2</td>
                        <td>Jl.Sultan Hasanuddin 2</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    <tr class="body-dark">
                        <td>3</td>
                        <td>Username 3</td>
                        <td>Jl.Sultan Hasanuddin 3</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                </tbody>
            </table>
        </body>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}" style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
    </body>
</html>