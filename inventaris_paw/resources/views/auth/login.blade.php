@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100">
    <div class="row min-vh-100">

        <!-- LEFT: ILLUSTRATION -->
        <div class="col-md-7 d-none d-md-flex align-items-center justify-content-center"
             style="background:#eaf7fb">
            <img 
                src="{{ asset('images/login-illustration.png') }}" 
                alt="Inventory Illustration"
                class="w-100 h-100"
                style="object-fit:cover"
            >
        </div>

        <!-- RIGHT: LOGIN FORM -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-white">
            <div class="card shadow p-4 border-0"
                 style="width:420px;border-radius:16px">

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
                            class="form-control form-control-lg"
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
                            class="form-control form-control-lg"
                            placeholder="Kata Sandi" 
                            required
                        >
                    </div>

                    <!-- REMEMBER + FORGOT -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <label class="form-check-label">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                class="form-check-input me-1"
                            >
                            Ingat saya
                        </label>

                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            Lupa Password?
                        </a>
                    </div>

                    <!-- LOGIN BUTTON -->
                    <button 
                        type="submit"
                        class="btn btn-info w-100 text-white fw-bold py-2 mb-3"
                        style="border-radius:10px"
                    >
                        Masuk
                    </button>
                </form>

                <div class="text-center text-muted mb-2">
                    Tidak memiliki akun?
                </div>

                <a 
                    href="{{ route('register') }}" 
                    class="btn btn-outline-info w-100 fw-semibold py-2"
                    style="border-radius:10px"
                >
                    Buat akun baru
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
