@extends('layouts.app')

@section('title', 'Dashboard Siswa - Pengaduan')

@section('content')
<div class="navbar">
    <a href="/" class="navbar-brand">
        <i class="fas fa-school"></i> Pengaduan Sekolah
    </a>
    <div class="navbar-nav">
        <span class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(session('user_name'), 0, 1)) }}
            </div>
            <span>{{ session('user_name') }}</span>
        </span>
        <a href="/logout" class="btn btn-danger btn-sm">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</div>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h1 style="font-size: 28px; font-weight: 700; color: var(--dark);">
            <i class="fas fa-list"></i> Pengaduan Saya
        </h1>
        <a href="/siswa/pengaduan/create" class="btn btn-primary">
            <i class="fas fa-plus"></i> Buat Pengaduan Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if($data->count() == 0)
        <div style="text-align: center; padding: 60px 20px; background: #f8f9fa; border-radius: 8px;">
            <i class="fas fa-inbox" style="font-size: 60px; color: var(--gray); margin-bottom: 20px;"></i>
            <h3 style="color: var(--gray); margin-bottom: 10px;">Belum ada pengaduan</h3>
            <p style="color: var(--gray); margin-bottom: 20px;">
                Yuk, buat pengaduan pertama Anda!
            </p>
            <a href="/siswa/pengaduan/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat Pengaduan
            </a>
        </div>
    @else
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Judul</th>
                        <th style="width: 15%;">Status</th>
                        <th style="width: 20%;">Foto</th>
                        <th style="width: 20%;">Tanggal</th>
                        <th style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <strong>{{ $item->judul }}</strong>
                            <div style="font-size: 13px; color: var(--gray); margin-top: 5px;">
                                <i class="fas fa-tag"></i> {{ $item->kategori }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-{{ $item->status }}">
                                <i class="fas fa-circle status-indicator status-{{ $item->status }}"></i>
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            @if($item->foto)
                                <img src="{{ asset('uploads/' . $item->foto) }}" width="80" class="image-preview">
                            @else
                                <span style="color: var(--gray);">-</span>
                            @endif
                        </td>
                        <td>
                            <div style="font-size: 13px;">
                                {{ $item->created_at->format('d/m/Y') }}
                                <br>
                                <small style="color: var(--gray);">{{ $item->created_at->format('H:i') }}</small>
                            </div>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="/siswa/pengaduan/{{ $item->id }}" class="btn btn-sm btn-outline" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a 
                                    href="/siswa/pengaduan/delete/{{ $item->id }}" 
                                    class="btn btn-sm btn-danger" 
                                    title="Hapus"
                                    onclick="return confirm('Yakin ingin menghapus pengaduan ini?')"
                                >
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection