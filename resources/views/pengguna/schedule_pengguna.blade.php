@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo2.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('schedule_pengguna') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #43CD8B; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Schedule</a>
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
            <h2> Kamar Hotel</h2>
            <h2> Schedule Booking</h2>
            <h2> Hotel Anda</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Batas Waktu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!!$ketersediaanKamar->count())
                    @foreach ($ketersediaanKamar as $kk)
                        <tr class="body-dark">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kk->hotel_penerbangan->nama }}</td>
                            <td>{{ $kk->hotel_penerbangan->keterangan->keterangan_satu }}</td>
                            <td>{{ $kk->tanggal_booking }}</td>
                            <td></td>
                            <td>
                                <a href="{{ route ('cancel', $kk->id)}}" class="btn tombol"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"> <b>Batalkan</b></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Data Kosong</td>
                    </tr>
                @endif
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
            <h2> Schedule Penerbangan </h2>
            <h2> Anda</h2>
        </div>
        <table class="table text-center">
            <thead>
                <tr class="head">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Waktu WITA </th>
                    <th scope="col">Batas Waktu</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!!$tiketPenerbangan->count())
                    @foreach ($tiketPenerbangan as $tb)
                        <tr class="body-dark">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tb->hotel_penerbangan->nama }}</td>
                            <td>{{ $tb->hotel_penerbangan->keterangan->keterangan_satu }}</td>
                            <td>{{ $tb->hotel_penerbangan->keterangan->keterangan_dua }}</td>
                            <td>{{ $tb->tanggal_booking }}</td>
                            <td>
                            <a href="{{ route ('cancel', $tb->id)}}" class="btn tombol"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data?');"> <b>Batalkan</b></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">Data Kosong</td>
                    </tr>
                @endif
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
