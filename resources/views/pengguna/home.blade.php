@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo2.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #43CD8B ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('schedule_pengguna') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Schedule</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('logout') }}"
            style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
    </li>
@endsection

@section('isi')
    @if (!!session('success'))
        <div class="alert alert-success" role="alert" id="msg-box">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('success') }}
        </div>
    @endif

    @if (!!session('error'))
        <div class="alert alert-danger" role="alert" id="msg-box">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('error') }}
        </div>
    @endif

    <div class="pengguna">
        <div class="text-left">
            <h2> Selamat datang {{ Auth::user()->name }} </h2>
            <div>
                <img src="{{ URL::asset('images/homepic.png') }}" width="200px" height="255px">
            </div>
            <h4> Jumlah saldo Anda: </h4>
            <div>
                <a type="container"
                    style="background: #ffffff; border-radius: 45px; height: 40px; width: 200px; color: rgb(24, 24, 24); display: flex; flex-direction: row; justify-content: center; align-items: center; border: 2px solid #43CD8B; padding: 18px 24px;">{{ Auth::user()->saldo_emoney }}</a>
            </div>
        </div>

        <div class="text-left">
            <h2> Kamar Hotel</h2>
            <h2> Temukan Kamar Hotel sesuai dengan</h2>
            <h2> kenyamanan anda</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Status</th>
                    <th scope="col">Harga per Checkin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <script>
            function showErrorMessage() {
                alert("Tidak ada tiket yang dapat di booking");
            }
            </script>
            
            <tbody>
                @foreach ($ketersediaanKamar as $kk)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kk->nama }}</td>
                        <td>{{ $kk->keterangan->keterangan_satu }}</td>
                        <td>{{ $kk->status }}   </td>
                        <td>{{ $kk->harga }}</td>
                        <td>
                            <button class="btn tombol" data-bs-toggle="modal"
                                data-bs-target="#kamarModal{{ $kk->id }}">
                                <b>pesan</b></button>

                                <div class="modal fade" id="kamarModal{{ $kk->id }}" tabindex="-1"aria-labelledby="kamarModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        @if ($kk->status === 'Tidak Tersedia')
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="kamarModalLabel">Tidak ada tiket yang dapat di booking</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        @else
                                            <form action="{{ route('booking', $kk->id) }}" method="POST">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="kamarModalLabel">Silahkan isi data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Tanggal Booking</span>
                                                        <input type="date" class="form-control" name="tanggal_booking" required>
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Jumlah</span>
                                                        <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah kamar" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                        style="background: grey; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px; border: 0">Batal</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px; border: 0">Pesan</button>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>

        <div class="text-left">
            <h2> Tiket Penerbangan</h2>
            <h2> Cari kursi Penerbangan yang</h2>
            <h2> anda perlukan</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Harga Ekonomi </th>
                    <th scope="col">Waktu WITA</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiketPenerbangan as $tb)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tb->nama }}</td>
                        <td>{{ $tb->keterangan->keterangan_satu }}</td>
                        <td>{{ $tb->status }}</td>
                        <td>{{ $tb->harga }}</td>
                        <td>{{ $tb->keterangan->keterangan_dua }}</td>
                        <td>
                            <button class="btn tombol" data-bs-toggle="modal"
                                data-bs-target="#tiketModal{{ $tb->id }}"><b>pesan</b></button>

                            <div class="modal fade" id="tiketModal{{ $tb->id }}" tabindex="-1"
                                aria-labelledby="tiketModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    @if ($tb->status === 'Tidak Tersedia')
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="kamarModalLabel">Tidak ada tiket yang dapat di booking</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    @else   
                                        <form action="{{ route('booking', $tb->id) }}" method="POST">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="tiketModalLabel">Silahkan isi data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Tanggal Booking</span>
                                                    <input type="date" class="form-control" name="tanggal_booking"
                                                        required>
                                                </div>

                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Jumlah</span>
                                                    <input type="number" class="form-control" name="jumlah"
                                                        placeholder="Masukkan jumlah tiket" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                                    style="background: grey; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px; border: 0">Batal</button>
                                                <button type="submit" class="btn btn-primary"
                                                    style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px; border: 0">Pesan</button>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #43CD8B; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
    </div>
@endsection
