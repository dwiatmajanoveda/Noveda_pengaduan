@extends('layouts.app')

@section('title', 'Register - Pengaduan Sekolah')

@section('content')
<div style="max-width: 500px; margin: 80px auto;">
    <div class="card">
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fas fa-user-plus" style="font-size: 50px; color: var(--primary); margin-bottom: 15px;"></i>
            <h1 style="font-size: 26px; font-weight: 700; color: var(--dark);">
                Register Siswa
            </h1>
            <p style="color: var(--gray); margin-top: 5px;">
                Buat akun untuk melaporkan sarana sekolah
            </p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <div class="form-group">
                <label for="name">
                    <i class="fas fa-user"></i> Nama Lengkap
                </label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    placeholder="Masukkan nama lengkap Anda"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    placeholder="Email"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Password
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="form-control" 
                    placeholder="Minimal 8 karakter"
                    required
                    minlength="8"
                >
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px;">
                <i class="fas fa-user-plus"></i> Daftar Sekarang
            </button>
        </form>

        <div style="margin-top: 25px; text-align: center;">
            <p style="color: var(--gray); margin-bottom: 10px;">
                Sudah punya akun?
            </p>
            <a href="/login" class="btn btn-outline" style="width: 100%;">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        </div>
    </div>
</div>
@endsection
