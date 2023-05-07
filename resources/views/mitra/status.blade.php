@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo3.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home_mitra') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('status') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F67C55; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Booking
            Status</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('logout') }}"
            style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
    </li>
@endsection

@section('isi')
    <div class="mitra">
        <div class="text-left">
            <h2> Kamar Hotel</h2>
            <h2> Booking status</h2>
            <h2> Kamar Hotel Anda</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Kamar Terbooking</th>
                    <th scope="col">Kamar Tersedia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ketersediaanKamar as $kk)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kk->nama }}</td>
                        <td>{{ $kk->keterangan->keterangan_satu }}</td>
                        <td>{{ $kk->jumlah_terbooking }}</td>
                        <td>{{ $kk->stok - $kk->jumlah_terbooking }}</td>
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
            <h2> Booking Status</h2>
            <h2> Penerbangan Anda</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Waktu WITA</th>
                    <th scope="col">Kursi Terbooking</th>
                    <th scope="col">Kursi Tersedia</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiketPenerbangan as $tb)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tb->nama }}</td>
                        <td>{{ $tb->keterangan->keterangan_satu }}</td>
                        <td>{{ \Carbon\Carbon::parse($tb->keterangan->keterangan_dua)->format('H:i') }}</td>
                        <td>{{ $tb->jumlah_terbooking }}</td>
                        <td>{{ $tb->stok - $tb->jumlah_terbooking }}</td>
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
