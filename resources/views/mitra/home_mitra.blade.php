@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo3.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home_mitra') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F67C55 ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('status') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Booking
            Status</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('logout') }}"
            style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
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

    <div class="mitra">
        <div class="text-left">
            <h2> Selamat datang {{ Auth::user()->name }} </h2>
            <div>
                <img src="{{ URL::asset('images/homepic.png') }}" width="200px" height="255px">
            </div>
            <h4> Jumlah saldo Anda: </h4>
            <div>
                <a type="container"
                    style="background: #ffffff; border-radius: 45px; height: 40px; width: 200px; color: rgb(24, 24, 24); display: flex; flex-direction: row; justify-content: center; align-items: center; border: 2px solid #F67C55; padding: 18px 24px;">{{ Auth::User()->saldo_emoney }}</a>
            </div>
        </div>
        <div class="text-left">
            <h2> Kamar Hotel</h2>
            <h2> Tambahkan</h2>
            <h2> Kamar Hotel Anda</h2>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('add_hp', 'Hotel') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Tambah</a>
        </div>
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
                @foreach ($ketersediaanKamar as $kk)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kk->nama }}</td>
                        <td>{{ $kk->keterangan->keterangan_satu }}</td>
                        <td>{{ $kk->stok }}</td>
                        <td>{{ $kk->harga }}</td>
                        <td><a href="{{ route('edit_hp', [$kk->id, 'Hotel']) }}" class="btn tombol"><b>edit</b></a><a
                                href="{{ route('delete_hp', $kk->id) }}" class="btn tombol"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"><b>hapus</b></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>

        <div class="text-left">
            <h2> Tiket Penerbangan</h2>
            <h2> Tambahkan Schedule</h2>
            <h2> Kamar Hotel Anda</h2>
        </div>
        <div class="text-right">
            <a type="button" href="{{ route('add_hp', 'Penerbangan') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Tambah</a>
        </div>
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
                @foreach ($tiketPenerbangan as $tb)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tb->nama }}</td>
                        <td>{{ $tb->keterangan->keterangan_satu }}</td>
                        <td>{{ \Carbon\Carbon::parse($tb->keterangan->keterangan_dua)->format('H:i') }}
                        <td>{{ $tb->stok }}</td>
                        <td>{{ $tb->harga }}</td>
                        <td><a href="{{ route('edit_hp', [$tb->id, 'Penerbangan']) }}" class="btn tombol"><b>edit</b></a><a
                                href="{{ route('delete_hp', $tb->id) }}" class="btn tombol"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"><b>hapus</b></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
    </div>
@endsection
