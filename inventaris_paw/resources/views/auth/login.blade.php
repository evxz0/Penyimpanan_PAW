@extends('layouts.app')

@section('content')
<div class="container-fluid login-wrapper p-0">
    <div class="row min-vh-100 g-0">

        <!-- LEFT ILLUSTRATION -->
        <div class="col-md-7 d-none d-md-flex align-items-center justify-content-center login-left">
            <img 
                src="{{ asset('images/login-illustration.png') }}"
                alt="Inventory Illustration"
                class="login-illustration"
            >
        </div>

        <!-- RIGHT LOGIN FORM -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-white">
            <div class="card border-0 p-4 login-card">

                <h3 class="fw-bold text-center mb-2">
                    Selamat Datang!
                </h3>

                <p class="text-muted text-center mb-4">
                    Untuk terus terhubung dengan sistem manajemen inventaris Owabong
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <input
                            type="email"
                            name="email"
                            class="form-control login-input"
                            placeholder="Alamat Email"
                            required
                            autofocus
                        >
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control login-input"
                            placeholder="Kata Sandi"
                            required
                        >
                    </div>

                    <!-- REMEMBER + FORGOT -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" name="remember" class="form-check-input me-1">
                            Ingat saya
                        </label>

                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            Lupa Password?
                        </a>
                    </div>

                    <!-- LOGIN BUTTON -->
                    <button type="submit" class="btn btn-info text-white w-100 login-btn mb-3">
                        Masuk
                    </button>
                </form>

                <div class="text-center text-muted mb-2">
                    Tidak memiliki akun?
                </div>

                <div class="text-center">
                    <a 
                        href="{{ route('register') }}" 
                        class="btn btn-info text-white fw-semibold px-4 py-2"
                        style="border-radius:999px; min-width:180px;"
                    >
                        
                        Buat akun baru
                    </a>
                </div>