<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller {
    public function login(Request $request) {
        return view('authentication.login');
    }

    public function _login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
        ],
        [
            'username.required' => 'Nama Pengguna tidak boleh kosong',
            'username.string' => 'Nama Pengguna harus berupa string',
            'password.required' => 'Kata Sandi tidak boleh kosong',
            'password.string' => 'Kata Sandi harus berupa string'
        ]);

        if (Auth::attempt($credentials) == false) {
            return back()
                ->withErrors([
                    'loginError' => 'Nama Pengguna atau kata Sandi salah'
                ])
                ->withInput();
        }

        return redirect('/');
    }
}
