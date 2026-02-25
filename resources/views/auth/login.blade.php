@extends('layouts.app')

@section('title', 'Login - Pengaduan Sekolah')

@section('content')
<div style="max-width: 450px; margin: 100px auto;">
    <div class="card" style="text-align: center; padding: 40px;">
        <div style="margin-bottom: 20px;">
            <i class="fas fa-school" style="font-size: 60px; color: var(--primary);"></i>
        </div>
        <h1 style="font-size: 28px; font-weight: 700; margin-bottom: 30px; color: var(--dark);">
            Pengaduan Sarana Sekolah
        </h1>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group">
                <input 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="Email" 
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <input 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="Password" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 18px;">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #e0e0e0;">
            <p style="color: var(--gray); margin-bottom: 15px;">
                Belum punya akun?
            </p>
            <a href="/register" class="btn btn-outline" style="width: 100%;">
                <i class="fas fa-user-plus"></i> Register Siswa
            </a>
        </div>

        <div style="margin-top: 15px; padding: 15px; background: #e7f3ff; border-radius: 8px;">
            <p style="font-size: 14px; color: var(--primary); margin: 0;">
                <i class="fas fa-info-circle"></i> 
                <strong>Admin:</strong> admin@sekolah.com | <strong>Password:</strong> admin123
            </p>
        </div>
    </div>
</div>
@endsection
