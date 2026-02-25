@extends('layouts.app')

@section('title', 'Buat Pengaduan - Pengaduan Sekolah')

@section('content')
<div class="navbar">
    <a href="/" class="navbar-brand">
        <i class="fas fa-school"></i> Pengaduan Sekolah
    </a>
    <div class="navbar-nav">
        <a href="/siswa/pengaduan" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div style="text-align: center; margin-bottom: 30px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 50px; color: var(--warning); margin-bottom: 15px;"></i>
        <h1 style="font-size: 26px; font-weight: 700; color: var(--dark);">
            Form Pengaduan Sarana Sekolah
        </h1>
        <p style="color: var(--gray); margin-top: 5px;">
            Laporkan masalah sarana sekolah Anda
        </p>
    </div>

    <form method="POST" action="/siswa/pengaduan/store" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="judul">
                <i class="fas fa"></i> Judul Pengaduan <span style="color: var(--danger);">*</span>
            </label>
            <input 
                type="text" 
                name="judul" 
                id="judul" 
                class="form-control" 
            >
        </div>

        <div class="form-group">
            <label for="kategori">
                <i class="fas fa-tags"></i> Kategori <span style="color: var(--danger);">*</span>
            </label>
             <input 
                type="text" 
                name="kategori" 
                id="kategori" 
                class="form-control" 
            >
        </div>

        <div class="form-group">
            <label for="lokasi">
                <i class="fas fa-map-marker-alt"></i> Lokasi <span style="color: var(--danger);">*</span>
            </label>
            <input 
                type="text" 
                name="lokasi" 
                id="lokasi" 
                class="form-control" 
            >
        </div>

        <div class="form-group">
            <label for="deskripsi">
                <i class="fas fa-align-left"></i> Deskripsi Lengkap <span style="color: var(--danger);">*</span>
            </label>
            <textarea 
                name="deskripsi" 
                id="deskripsi" 
                class="form-control" 
                placeholder="Jelaskan secara detail masalah yang terjadi..." 
                required
            ></textarea>
        </div>

        <div class="form-group">
            <label for="foto">
                <i class="fas fa-camera"></i> Foto (Opsional)
            </label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small style="color: var(--gray); display: block; margin-top: 5px;">
                <i class="fas fa-info-circle"></i> Format: JPG, JPEG, PNG | Max: 2MB
            </small>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <a href="/siswa/pengaduan" class="btn btn-outline" style="flex: 1;">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">
                <i class="fas fa-paper-plane"></i> Kirim Pengaduan
            </button>
        </div>
    </form>
</div>
@endsection
