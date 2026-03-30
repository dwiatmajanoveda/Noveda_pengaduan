@extends('layouts.app')

@section('title', 'Edit Pengaduan - Pengaduan Sekolah')

@section('content')
<div class="navbar">
    <div class="navbar-brand" style="display: flex; align-items: center;">
    <img src="{{ asset('uploads/logo2.jpeg') }}" alt="Logo Sekolah" style="width: 80px; height: 80px; margin-right: 40px;">
    <span>Pengaduan Sekolah </>
</div>
    <div class="navbar-nav">
        <a href="/siswa/pengaduan" class="btn btn-outline"> Kembali
        </a>
    </div>
</div>

<div class="card">
    <div style="text-align: center; margin-bottom: 30px;">
        <i class="fas fa-edit" style="font-size: 50px; color: var(--warning); margin-bottom: 15px;"></i>
        <h1 style="font-size: 26px; font-weight: 700; color: var(--dark);">
            Edit Pengaduan Sarana Sekolah
        </h1>
        <p style="color: var(--gray); margin-top: 5px;">
            Perbarui informasi pengaduan Anda
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/siswa/pengaduan/update/{{ $pengaduan->id }}" enctype="multipart/form-data">
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
                placeholder="Contoh: Ruang Kelas XII IPA 1, Lantai 2"
                value="{{ $pengaduan->lokasi }}"
                required
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
            >{{ $pengaduan->deskripsi }}</textarea>
        </div>

        <div class="form-group">
            <label for="foto">
                <i class="fas fa-camera"></i> Foto (Opsional)
            </label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small style="color: var(--gray); display: block; margin-top: 5px;">
                <i class="fas fa-info-circle"></i> Format: JPG, JPEG, PNG | Max: 2MB
            </small>
            @if($pengaduan->foto)
                <div style="margin-top: 10px;">
                    <img src="{{ asset('uploads/' . $pengaduan->foto) }}" width="100" class="image-preview">
                    <p style="font-size: 12px; color: var(--gray); margin-top: 5px;">Foto saat ini</p>
                </div>
            @endif
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <a href="/siswa/pengaduan" class="btn btn-outline" style="flex: 1;">
                <i class="fas fa-times"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary" style="flex: 1;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection