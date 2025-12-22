@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="card shadow p-4" style="width:420px;border-radius:15px">
        <h3 class="fw-bold text-center mb-2">Selamat Datang!</h3>
        <p class="text-muted text-center mb-4">
            Untuk terus terhubung dengan sistem manajemen inventaris Owabong
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <input type="email" name="email" class="form-control"
                       placeholder="Alamat Email" required autofocus>
            </div>

            <div class="mb-3 position-relative">
                <input type="password" name="password" class="form-control"
                       placeholder="Kata Sandi" required>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <input type="checkbox" name="remember"> Ingat saya
                </div>
                <a href="{{ route('password.request') }}">Lupa Password?</a>
            </div>

            <button class="btn btn-info w-100 text-white fw-bold mb-3">
                Masuk
            </button>
        </form>

        <div class="text-center text-muted mb-2">Tidak memiliki akun?</div>
        <a href="{{ route('register') }}" class="btn btn-outline-info w-100">
            Buat akun baru
        </a>
    </div>
</div>
@endsection
