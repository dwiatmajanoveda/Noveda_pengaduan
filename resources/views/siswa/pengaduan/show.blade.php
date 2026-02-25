@extends('layouts.app')

@section('title', 'Detail Pengaduan - Pengaduan Sekolah')

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
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="font-size: 26px; font-weight: 700; color: var(--dark);">
            <i class="fas fa-info-circle"></i> Detail Pengaduan
        </h1>
        <span class="badge badge-{{ $pengaduan->status }}">
            <i class="fas fa-circle status-indicator status-{{ $pengaduan->status }}"></i>
            {{ ucfirst($pengaduan->status) }}
        </span>
    </div>

    <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 25px;">
        <h3 style="color: var(--primary); margin-bottom: 15px;">
            <i class="fas fa-heading"></i> {{ $pengaduan->judul }}
        </h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 15px;">
            <div>
                <small style="color: var(--gray);">Kategori</small>
                <p style="font-weight: 600; margin-top: 5px;">
                    <i class="fas fa-tag"></i> {{ $pengaduan->kategori }}
                </p>
            </div>
            <div>
                <small style="color: var(--gray);">Lokasi</small>
                <p style="font-weight: 600; margin-top: 5px;">
                    <i class="fas fa-map-marker-alt"></i> {{ $pengaduan->lokasi }}
                </p>
            </div>
            <div>
                <small style="color: var(--gray);">Tanggal</small>
                <p style="font-weight: 600; margin-top: 5px;">
                    <i class="fas fa-calendar"></i> {{ $pengaduan->created_at->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>
            <i class="fas fa-align-left"></i> Deskripsi
        </label>
        <div style="background: white; padding: 15px; border-radius: 8px; border: 1px solid #e0e0e0;">
            {{ $pengaduan->deskripsi }}
        </div>
    </div>

    @if($pengaduan->foto)
    <div class="form-group">
        <label>
            <i class="fas fa-image"></i> Foto Bukti
        </label>
        <div style="text-align: center; margin-top: 10px;">
            <img src="{{ asset('uploads/' . $pengaduan->foto) }}" class="image-preview" style="max-width: 400px;">
        </div>
    </div>
    @endif

    <div class="form-group" style="margin-top: 25px; padding-top: 25px; border-top: 2px solid #e0e0e0;">
        <label>
            <i class="fas fa-comment"></i> Tanggapan Admin
        </label>
        @if($pengaduan->tanggapan_admin)
            <div style="background: #e7f3ff; padding: 15px; border-radius: 8px; border-left: 4px solid var(--primary);">
                {{ $pengaduan->tanggapan_admin }}
            </div>
        @else
            <div style="background: #fff3cd; padding: 15px; border-radius: 8px; border-left: 4px solid var(--warning);">
                <i class="fas fa-clock"></i> Belum ada tanggapan dari admin
            </div>
        @endif
    </div>
</div>
@endsection
