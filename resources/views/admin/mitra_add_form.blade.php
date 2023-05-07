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
        <h5>Tambahkan akun mitra</h5>
        <form action="{{ route('add_mitra_action') }}" method="POST">
            @csrf
            <input type="text" class="form-control @error('name') mb-0 is-invalid @enderror" name="name"
                placeholder="Nama" aria-describedby="name-error" value="{{ old('name') }}" required>
            @error('name')
                <div id="name-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="email" class="form-control mt-2 @error('email') mb-0 is-invalid @enderror" name="email"
                placeholder="Email" aria-describedby="email-error" value="{{ old('email') }}" required>
            @error('email')
                <div id="email-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" class="form-control mt-2 @error('password') mb-0 is-invalid @enderror" name="password"
                placeholder="Password" aria-describedby="password-error">
            @error('password')
                <div id="password-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="password" class="form-control mt-2 @error('confirm-password') mb-0 is-invalid @enderror"
                name="confirm-password" placeholder="Konfirmasi Password" aria-describedby="confirm-password-error">
            @error('confirm-password')
                <div id="confirm-password-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" class="form-control mt-2 @error('saldo_emoney') mb-0 is-invalid @enderror"
                name="saldo_emoney" placeholder="Saldo Emoney" aria-describedby="saldo_emoney-error"
                value="{{ old('saldo_emoney') }}" required>
            @error('saldo_emoney')
                <div id="saldo_emoney-error" class="invalid-feedback mb-2 mt-0">
                    {{ $message }}
                </div>
            @enderror

            <input type="text" name="role_id" value="3" hidden>

            <a type="button" href="{{ route('sunting_mitra') }}" class="mt-2"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Batal</a>
            <button type="submit" class="btn mt-2"
                style="background: #F2A93A; border-radius: 45px; height: 40px; width: 100px; color: white; display: flex; flex-direction: row; justify-content: center; align-items: center; padding: 18px 24px;">Simpan</button>
        </form>
    </div>
@endsection
