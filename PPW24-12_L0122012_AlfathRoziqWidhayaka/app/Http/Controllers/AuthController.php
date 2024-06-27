<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|string|min:3|max:32|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        // Simpan password yang sudah di-hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat user baru
        User::create($validatedData);

        return redirect('/loginregister/login')->with('success', 'Registrasi Berhasil');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke halaman films.index setelah login berhasil
            return redirect()->intended(route('films.index'));
        }

        return back()->with('failed', 'Username atau password salah.');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginregister/login')->with('success', 'Anda telah berhasil logout.');
    }
}
