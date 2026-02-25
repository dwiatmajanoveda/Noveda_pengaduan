<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        return redirect('/login')->with('success', 'Register berhasil, silakan login.');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Password salah');
        }

        // simpan session manual
        session([
            'login' => true,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'role' => $user->role
        ]);

        // redirect sesuai role
        if ($user->role == 'admin') {
            return redirect('/admin/pengaduan');
        }
        return redirect('/siswa/pengaduan');
    }

    public function logout() {
        session()->flush();
        return redirect('/login')->with('success', 'Logout berhasil');
    }
}