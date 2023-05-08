@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo4.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home_admin') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('ketersediaan') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F2A93A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Ketersediaan</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('sunting_pengguna') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Pengguna</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('sunting_mitra') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Mitra</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('logout') }}"
            style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Logout</a>
    </li>
@endsection

@section('isi')
    <div class="admin">
        <div class="text-left">
            <h2> Kamar Hotel</h2>
            <h2> Ketersediaan</h2>
            <h2> Kamar Hotel</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jumlah Kamar</th>
                    <th scope="col">Kamar Terbooking</th>
                    <th scope="col">Kamar Tersedia</th>
                    <th scope="col">Status</th>
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
                        <td>{{ $kk->jumlah_terbooking }}</td>
                        <td>{{ $kk->stok - $kk->jumlah_terbooking }}</td>
                        <!-- <td>{{ $kk->status }}</td> -->
                        @if ($kk->jumlah_terbooking == $kk->stok)
                            <td>Tidak tersedia</td>
                        @else
                            <td>Tersedia</td>
                        @endif
                        <td><a href="{{ route ('edit_ketersediaan_Hotel', $kk->id)}}" class="btn tombol"><b>edit</b></a>
                            <a href="{{ route ('delete_hotel', $kk->id)}}"class="btn tombol"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"><b>hapus</b></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>

        <div class="text-left">
            <h2> Tiket Penerbangan</h2>
            <h2> Ketersediaan</h2>
            <h2> Kursi Penerbangan</h2>
        </div>
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
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiketPenerbangan as $tb)
                    <tr class="body-dark">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tb->nama }}</td>
                        <td>{{ $tb->keterangan->keterangan_satu }}</td>
                        <td>{{ $tb->keterangan->keterangan_dua }}</td>
                        <td>{{ $tb->stok }}</td>
                        <td>{{ $tb->jumlah_terbooking }}</td>
                        <td>{{ $tb->stok - $tb->jumlah_terbooking }}</td>
                        <!-- <td>{{ $tb->status }}</td> -->
                        @if ($tb->jumlah_terbooking == $tb->stok)
                            <td>Tidak tersedia</td>
                        @else
                            <td>Tersedia</td>
                        @endif
                        <td><a href="{{ route ('edit_ketersediaan_Pesawat', $tb->id)}}" class="btn tombol"><b>edit</b></a>
                            <a href="{{ route ('delete_penerbangan', $tb->id)}}"class="btn tombol"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"><b>hapus</b></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <a type="button" href="{{ route('logout') }}"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Prev</a>
            <a type="button" href="{{ route('logout') }}"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Next</a>
        </div>
    </div>
@endsection
