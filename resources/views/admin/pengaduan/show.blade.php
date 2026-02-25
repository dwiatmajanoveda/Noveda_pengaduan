@extends('layouts.app')

@section('title', 'Detail Pengaduan - Admin')

@section('content')
<div class="navbar">
    <a href="/" class="navbar-brand">
        <i class="fas fa-school"></i> Pengaduan Sekolah (Admin)
    </a>
    <div class="navbar-nav">
        <a href="/admin/pengaduan" class="btn btn-outline">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 25px; margin-bottom: 25px;">
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
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                <div>
                    <small style="color: var(--gray);">Pelapor</small>
                    <p style="font-weight: 600; margin-top: 5px;">
                        <i class="fas fa-user"></i> {{ $pengaduan->user->name }}
                    </p>
                </div>
                <div>
                    <small style="color: var(--gray);">Email</small>
                    <p style="font-weight: 600; margin-top: 5px;">
                        <i class="fas fa-envelope"></i> {{ $pengaduan->user->email }}
                    </p>
                </div>
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
                <i class="fas fa-align-left"></i> Deskripsi Lengkap
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
                <img src="{{ asset('uploads/' . $pengaduan->foto) }}" class="image-preview" style="max-width: 500px;">
            </div>
        </div>
        @endif
    </div>

    <div class="card">
        <h2 style="font-size: 20px; font-weight: 700; color: var(--dark); margin-bottom: 20px;">
            <i class="fas fa-cogs"></i> Update Status
        </h2>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/admin/pengaduan/update/{{ $pengaduan->id }}">
            @csrf

            <div class="form-group">
                <label for="status">
                    <i class="fas fa-flag"></i> Status Pengaduan <span style="color: var(--danger);">*</span>
                </label>
                <select name="status" id="status" class="form-control" required>
                    <option value="menunggu" {{ $pengaduan->status == 'menunggu' ? 'selected' : '' }}>
                        ⏳ Menunggu
                    </option>
                    <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>
                        🔧 Diproses
                    </option>
                    <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>
                        ✅ Selesai
                    </option>
                    <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>
                        ❌ Ditolak
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggapan_admin">
                    <i class="fas fa-comment-alt"></i> Tanggapan Admin
                </label>
                <textarea 
                    name="tanggapan_admin" 
                    id="tanggapan_admin" 
                    class="form-control" 
                    placeholder="Berikan tanggapan atau keterangan..."
                >{{ $pengaduan->tanggapan_admin }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </form>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; color: var(--dark);">
                <i class="fas fa-history"></i> Riwayat Status
            </h3>
            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px;">
                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                    <i class="fas fa-clock" style="color: var(--warning); margin-right: 10px;"></i>
                    <span>Dibuat: {{ $pengaduan->created_at->format('d/m/Y H:i') }}</span>
                </div>
                @if($pengaduan->updated_at != $pengaduan->created_at)
                <div style="display: flex; align-items: center;">
                    <i class="fas fa-sync-alt" style="color: var(--info); margin-right: 10px;"></i>
                    <span>Terakhir diupdate: {{ $pengaduan->updated_at->format('d/m/Y H:i') }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
