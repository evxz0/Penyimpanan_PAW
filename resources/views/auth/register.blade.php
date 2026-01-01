@extends('layouts.app')

@section('content')

<style>
    body, html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }
    .register-wrapper {
        min-height: 100vh;
    }
    .register-input {
        padding: 10px 14px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background: #F9FBFD;
    }
    .register-input:focus {
        border-color: #0DA5E9;
        box-shadow: 0 0 0 2px rgba(13,165,233,0.25);
    }
</style>

<div class="container-fluid p-0 register-wrapper">
    <div class="row g-0">

        <!-- FORM (LEFT) -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-white px-5">

            <div style="max-width: 400px; width: 100%;">

                <h2 class="fw-bold mb-2" style="font-size: 32px;">Buat Akun Baru</h2>
                <p class="text-muted mb-4">
                    Ayo kita mulai! Lakukan pendaftaran untuk segera masuk
                    ke dalam sistem manajemen inventaris Owabong.
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control register-input"
                               placeholder="Nama Pengguna" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="first_name" class="form-control register-input"
                                   placeholder="Nama Depan" required>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" class="form-control register-input"
                                   placeholder="Nama Belakang" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" class="form-control register-input"
                               placeholder="Alamat Email" required>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" name="password" id="password"
                               class="form-control register-input pe-5"
                               placeholder="Kata Sandi" required>

                        <span id="togglePassword"
                              style="cursor:pointer; position:absolute; right:15px; top:50%; transform:translateY(-50%); font-size: 18px;">
                            👁️
                        </span>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" required>
                        <label class="form-check-label text-muted">
                            Saya setuju dengan <a href="#" style="color:#0DA5E9;">kebijakan privasi dan keamanan</a>.
                        </label>
                    </div>

                    <button type="submit" class="btn w-100 text-white"
                        style="background: #0DA5E9; border-radius: 8px; padding:12px 0; font-size: 16px;">
                        Buat Akun
                    </button>

                    <div class="text-center mt-3">
                        Sudah punya akun? <a href="{{ route('login') }}" style="color:#0DA5E9;">Login Here</a>
                    </div>

                </form>
            </div>
        </div>

        <!-- IMAGE (RIGHT) -->
        <div class="col-md-7 p-0 m-0"
             style="height: 100vh; background:url('{{ asset('images/login-illustration.png') }}') center/cover no-repeat;">
        </div>

    </div>
</div>

<script>
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", () => {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    togglePassword.textContent = type === "password" ? "👁️" : "🙈";
});
</script>

@endsection
