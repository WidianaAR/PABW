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
    <div class="admin input-form m-5 px-5 b-1">
        <h5>Ubah data {{ $kategori }}</h5>
        <form action="{{ route('edit_hp_action', $data->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text">Nama</span>
                <input type="text" id="nama" class="form-control @error('nama') mb-0 is-invalid @enderror"
                    name="nama" value="{{ old('nama', $data->nama) }}" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Stok</span>
                <input type="number" class="form-control @error('stok') mb-0 is-invalid @enderror" name="stok"
                    value="{{ old('stok', $data->stok) }}" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Jumlah Terbooking</span>
                <input type="number" id="jumlah_terbooking"
                    class="form-control @error('jumlah_terbooking') mb-0 is-invalid @enderror" name="jumlah_terbooking"
                    aria-describedby="jumlah_terbooking-error"
                    value="{{ old('jumlah_terbooking', $data->jumlah_terbooking) }}" required>
                @error('jumlah_terbooking')
                    <div id="jumlah_terbooking-error" class="invalid-feedback mb-2 mt-0">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Harga</span>
                <input type="number" class="form-control @error('harga') mb-0 is-invalid @enderror" name="harga"
                    value="{{ old('harga', $data->harga) }}" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">{{ $kategori == 'Hotel' ? 'Alamat' : 'Rute Penerbangan' }}</span>
                <input type="text" class="form-control @error('keterangan_satu') mb-0 is-invalid @enderror"
                    name="keterangan_satu" value="{{ old('keterangan_satu', $data->keterangan->keterangan_satu) }}"
                    required>
            </div>

            <div class="input-group mb-3" {{ $kategori == 'Hotel' ? 'hidden' : '' }}>
                <span class="input-group-text">Waktu</span>
                <input type="time" class="form-control @error('keterangan_dua') mb-0 is-invalid @enderror"
                    name="keterangan_dua"
                    value="{{ \Carbon\Carbon::parse($data->keterangan->keterangan_dua)->format('H:i') }}">
            </div>

            <a type="button" href="{{ route('home_mitra') }}" class="mt-2"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Batal</a>
            <button type="submit" class="btn mt-2"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Simpan</button>
        </form>
    </div>
@endsection
