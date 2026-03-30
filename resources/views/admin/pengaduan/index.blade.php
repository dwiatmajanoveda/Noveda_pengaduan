@extends('layouts.app')

@section('title', 'Dashboard Admin - Pengaduan')

@section('content')
<div class="navbar">
   <div class="navbar-brand" style="display: flex; align-items: center;">
    <img src="{{ asset('uploads/logo2.jpeg') }}" alt="Logo Sekolah" style="width: 80px; height: 80px; margin-right: 40px;">
    <span>Pengaduan Sekolah</>
</div>
    <div class="navbar-nav">
        <span class="user-info">
            <div class="user-avatar" style="background: var(--danger);">
                A
            </div>
            <span>{{ session('user_name') }}</span>
        </span>
        <a href="/logout" class="btn btn-danger btn-sm">Logout
        </a>
    </div>
</div>

<div class="card">
    <h1 style="font-size: 28px; font-weight: 700; color: var(--dark); margin-bottom: 25px;">
        <i class="fas fa-list"></i> Dashboard Pengaduan
    </h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: white; padding: 25px; border-radius: 12px; text-align: center;">
            <i class="fas fa-list" style="font-size: 36px; margin-bottom: 10px;"></i>
            <h3 style="font-size: 32px; margin: 10px 0;">{{ $data->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Total Pengaduan</p>
        </div>
        <div style="background: linear-gradient(135deg, var(--warning), #e07a1f); color: white; padding: 25px; border-radius: 12px; text-align: center;">
            <i class="fas fa-clock" style="font-size: 36px; margin-bottom: 10px;"></i>
            <h3 style="font-size: 32px; margin: 10px 0;">{{ $data->where('status', 'menunggu')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Menunggu</p>
        </div>
        <div style="background: linear-gradient(135deg, var(--info), #3a86e9); color: white; padding: 25px; border-radius: 12px; text-align: center;">
            <i class="fas fa-cog" style="font-size: 36px; margin-bottom: 10px;"></i>
            <h3 style="font-size: 32px; margin: 10px 0;">{{ $data->where('status', 'diproses')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Diproses</p>
        </div>
        <div style="background: linear-gradient(135deg, var(--success), #3ab5d1); color: white; padding: 25px; border-radius: 12px; text-align: center;">
            <i class="fas fa-check-circle" style="font-size: 36px; margin-bottom: 10px;"></i>
            <h3 style="font-size: 32px; margin: 10px 0;">{{ $data->where('status', 'selesai')->count() }}</h3>
            <p style="margin: 0; opacity: 0.9;">Selesai</p>
        </div>
    </div>
    <div class="card">
    <h1 style="font-size: 28px; font-weight: 700; color: var(--dark); margin-bottom: 25px;"></h1>

    <div style="margin-bottom: 25px; padding: 15px; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <form method="GET" action="/admin/pengaduan" style="display: flex; gap: 15px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 150px;">
                <label for="search" style="display: block; margin-bottom: 8px; color: var(--dark); font-weight: 500;">
                    Cari Pengaduan
                </label>
                <input 
                    type="text" 
                    name="search" 
                    id="search" 
                    class="form-control" 
                    placeholder="Cari berdasarkan judul, nama siswa, lokasi..." 
                    value="{{ request('search') }}"
                    style="width: 100%;"
                >
            </div>
            
            <div style="flex: 1; min-width: 200px;">
                <label for="status" style="display: block; margin-bottom: 8px; color: var(--dark); font-weight: 500;">
                    Filter Berdasarkan Status
                </label>
                <select name="status" id="status" class="form-control" style="width: 100%;">
                    <option value="">Semua Status</option>
                    <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            
            <div style="display: flex; align-items: flex-end; gap: 10px;">
                <button type="submit" class="btn btn-primary" style="padding: 15px 20px;">
                    <i class="fas fa-search"></i> Cari
                </button>
                <a href="/admin/pengaduan" class="btn btn-outline" style="padding: 10px 15px;">
                    <i class="fas fa-undo"></i> Reset
                </a>
            </div>
        </form>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px;">
    </div>
    
    <div style="overflow-x: auto;">
    </div>
</div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">Siswa</th>
                    <th style="width: 25%;">Judul</th>
                    <th style="width: 12%;">Kategori</th>
                    <th style="width: 12%;">Status</th>
                    <th style="width: 10%;">Foto</th>
                    <th style="width: 10%;">Tanggal</th>
                    <th style="width: 6%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <div style="font-weight: 600;">{{ $item->user->name }}</div>
                        <small style="color: var(--gray);">{{ $item->user->email }}</small>
                    </td>
                    <td>
                        <strong>{{ $item->judul }}</strong>
                        <div style="font-size: 13px; color: var(--gray); margin-top: 5px;">
                            <i class="fas fa-map-marker-alt"></i> {{ $item->lokasi }}
                        </div>
                    </td>
                    <td>
                        <span style="background: #e9ecef; padding: 5px 10px; border-radius: 15px; font-size: 13px;">
                            {{ $item->kategori }}
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-{{ $item->status }}">
                            <i class="fas fa-circle status-indicator status-{{ $item->status }}"></i>
                            {{ $item->status }}
                        </span>
                    </td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('uploads/' . $item->foto) }}" width="60" class="image-preview">
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
                        <a href="/admin/pengaduan/{{ $item->id }}" class="btn btn-sm btn-outline" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
