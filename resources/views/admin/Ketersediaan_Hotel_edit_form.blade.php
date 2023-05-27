@extends('layout.navbar')

@section('top-navbar')
    <li class="nav-item">
        <img src="{{ URL::asset('images/logo4.png') }}" width="100px" height="40px">
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('home_admin') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #F2A93A ; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Home</a>
    </li>
    <li class="nav-item" style="padding-right: 5vh">
        <a type="button" href="{{ route('ketersediaan') }}"
            style="background: #ffffff; border-radius: 45px; height: 40px; width: 100px; color: #343A3A; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Ketersediaan</a>
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
    <div class="admin input-form m-5 px-5 b-1">
        <h5>Ubah Ketersediaan Kamar Hotel</h5>
        <form action="{{ route('edit_ketersediaan_Hotel_action', $data->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="text" class="form-control @error('nama') mb-0 is-invalid @enderror" name="nama"
                placeholder="Nama" aria-describedby="name-error" value="{{old('nama', $data->nama)}}" required>
            @error('nama')
                <div id="name-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control mt-2 @error('keterangan_satu') mb-0 is-invalid @enderror" name="keterangan_satu"
                placeholder="Alamat" aria-describedby="keterangan_satu-error" value="{{ old('keterangan_satu', $data->keterangan->keterangan_satu) }}" required>
            @error('keterangan->keterangan_satu')
                <div id="keterangan_satu-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="number" class="form-control @error('stok') mb-0 is-invalid @enderror" name="stok"
                placeholder="Jumlah Kamar" aria-describedby="stok-error" value="{{old('stok', $data->stok)}}" required>
            @error('stok')
                <div id="stok-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror
            
            <input type="number" class="form-control @error('jumlah_terbooking') mb-0 is-invalid @enderror" name="jumlah_terbooking"
                placeholder="Kamar Terbooking" aria-describedby="jumlah_terbooking-error" value="{{old('jumlah_terbooking', $data->jumlah_terbooking)}}" required>
            @error('jumlah_terbooking')
                <div id="jumlah_terbooking-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <a type="button" href="{{ route('ketersediaan') }}" class="mt-2"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Batal</a>
            <button type="submit" class="btn mt-2"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Simpan</button>
        </form>
    </div>
@endsection
