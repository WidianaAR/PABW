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
                            <a type="button" href="{{ route('home_admin') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
                        </li>
                        <li class="nav-item" style="padding-right: 5vh">
                            <a type="button" href="{{ route('ketersediaan') }}" style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F2A93A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Ketersediaan</a>
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
            <h2> Kamar Hotel</h2>
            <h2> Ketersediaan</h2>
            <h2> Kamar Hotel</h2>
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
                    background: #F2A93A;
                    border-radius: 50px;
                    color: white;
                }
    
                .tombol:hover {
                    background: #ae7a2b;
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
                        <th scope="col">Kamar Terbooking</th>
                        <th scope="col">Kamar Tersedia</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ketersediaanKamar as $kk)
                    <tr class="body-dark">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kk->nama}}</td>
                        <td>{{$kk->alamat}}</td>
                        <td>{{$kk->jumlah_kamar}}</td>
                        <td>{{$kk->kamar_terbooking}}</td>
                        <td>{{$kk->kamar_tersedia}}</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    @endforeach
                    <!-- <tr class="body-light">
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
                    </tr> -->
                </tbody>
            </table>
        </body>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}" style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
        <div class="text-left">
            <h2> Tiket Penerbangan</h2>
            <h2> Ketersediaan</h2>
            <h2> Kursi Penerbangan</h2>
        </div>
        <div class="table">
            <title>Template Tabel 4Tels</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
            <style>
                table, th, td {
                    border: 3px solid white;
                }
    
                tr.head {
                    background-color: #F2A93A;
                    color: white;
                }
    
                tr.body-light {
                    background-color: #E8F3EE;
                }
    
                tr.body-dark {
                    background-color: #ff94703d;
                }
    
                .tombol {
                    background: #F2A93A;
                    border-radius: 50px;
                    color: white;
                }
    
                .tombol:hover {
                    background: #ae7a2b;
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
                        <th scope="col">Kursi Terbooking</th>
                        <th scope="col">Kursi Tersedia</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tiketPenerbangan as $tb)
                    <tr class="body-dark">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$tb->nama}}</td>
                        <td>{{$tb->tujuan}}</td>
                        <td>{{$tb->waktu}}</td>
                        <td>{{$tb->jumlah_kursi}}</td>
                        <td>{{$tb->kursi_terbooking}}</td>
                        <td>{{$tb->kursi_tersedia}}</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr>
                    @endforeach
                    <!-- <tr class="body-light">
                        <td>2</td>
                        <td>Username 2</td>
                        <td>Jl.Sultan Hasanuddin 2</td>
                        <td>Username</td>
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
                        <td>Username</td>
                        <td><a href="" class="btn tombol"><b>edit</b></a><a href="" class="btn tombol"><b>hapus</b></a></td>
                    </tr> -->
                </tbody>
            </table>
        </body>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}" style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}" style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
    </body>
</html>