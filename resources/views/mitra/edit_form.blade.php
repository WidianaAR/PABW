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
            <input type="text" class="form-control @error('nama') mb-0 is-invalid @enderror" name="nama"
                placeholder="Nama" aria-describedby="nama-error" value="{{ old('nama', $data->nama) }}" required>
            @error('nama')
                <div id="nama-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control mt-2 @error('stok') mb-0 is-invalid @enderror" name="stok"
                placeholder="Jumlah" aria-describedby="stok-error" value="{{ old('stok', $data->stok) }}" required>
            @error('stok')
                <div id="stok-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control mt-2 @error('harga') mb-0 is-invalid @enderror" name="harga"
                placeholder="Harga satuan" aria-describedby="harga-error" value="{{ old('harga', $data->harga) }}"
                required>
            @error('harga')
                <div id="harga-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control mt-2 @error('keterangan_satu') mb-0 is-invalid @enderror"
                name="keterangan_satu" placeholder="{{ $kategori == 'Hotel' ? 'Alamat' : 'Rute' }}"
                aria-describedby="keterangan_satu-error"
                value="{{ old('keterangan_satu', $data->keterangan->keterangan_satu) }}" required>
            @error('keterangan_satu')
                <div id="keterangan_satu-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="time" class="form-control mt-2 @error('keterangan_dua') mb-0 is-invalid @enderror"
                name="keterangan_dua" placeholder="Waktu penerbangan" aria-describedby="keterangan_dua-error"
                value="{{ \Carbon\Carbon::parse($data->keterangan->keterangan_dua)->format('H:i') }}"
                {{ $kategori == 'Hotel' ? 'hidden' : '' }}>
            @error('keterangan_dua')
                <div id="keterangan_dua-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <a type="button" href="{{ route('home_mitra') }}" class="mt-2"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Batal</a>
            <button type="submit" class="btn mt-2"
                style="background: #F67C55; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Simpan</button>
        </form>
    </div>
@endsection
