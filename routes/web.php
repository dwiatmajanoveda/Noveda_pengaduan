<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaPengaduanController;
use App\Http\Controllers\AdminPengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// AUTH
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerPost']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/logout', [AuthController::class, 'logout']);

// SISWA
Route::middleware(['loginManual', 'roleManual:siswa'])->group(function () {
    Route::get('/siswa/pengaduan', [SiswaPengaduanController::class, 'index']);
    Route::get('/siswa/pengaduan/create', [SiswaPengaduanController::class, 'create']);
    Route::post('/siswa/pengaduan/store', [SiswaPengaduanController::class, 'store']);
    Route::get('/siswa/pengaduan/{id}', [SiswaPengaduanController::class, 'show']);
    Route::get('/siswa/pengaduan/edit/{id}', [SiswaPengaduanController::class, 'edit']);
    Route::post('/siswa/pengaduan/update/{id}', [SiswaPengaduanController::class, 'update']);
    Route::get('/siswa/pengaduan/delete/{id}', [SiswaPengaduanController::class, 'delete']);
});

// ADMIN
Route::middleware(['loginManual', 'roleManual:admin'])->group(function () {
    Route::get('/admin/pengaduan', [AdminPengaduanController::class, 'index']);
    Route::get('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'show']);
    Route::post('/admin/pengaduan/update/{id}', [AdminPengaduanController::class, 'update']);
});