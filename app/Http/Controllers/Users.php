<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Users extends Controller{
    public function index(Request $request) {
        if ($request->user()->role == 'admin') {
            return view('admin.users', [
                'user' => $request->user(),
                'users' => User::where('role', 'user')
                    ->orderBy('created_at', 'desc')
                    ->get()
            ]);
        }
    }

    public function _addUser(Request $request) {
        if ($request->user()->role == 'admin') {
            $userData = $request->validate([
                'username' => ['required', 'string', 'max:32', 'unique:users,username'],
                'password' => ['required', 'string'],
                'passwordConfirmation' => ['required', 'string', 'same:password']
            ],
            [
                'username.required' => 'Nama Pengguna tidak boleh kosong',
                'username.string' => 'Nama Pengguna harus berupa string',
                'username.max' => 'Nama Pengguna tidak boleh lebih dari 32 karakter',
                'username.unique' => 'Nama Pengguna sudah terdaftar',
                'password.required' => 'Kata Sandi tidak boleh kosong',
                'password.string' => 'Kata Sandi harus berupa string',
                'passwordConfirmation.required' => 'Konfirmasi Kata Sandi tidak boleh kosong',
                'passwordConfirmation.string' => 'Konfirmasi Kata Sandi harus berupa string',
                'passwordConfirmation.same' => 'Konfirmasi Kata Sandi harus sama dengan kata Sandi'
            ]);

            User::create([
                ...$userData,
                'password' => Hash::make($userData['password'], [
                    'rounds' => 10
                ]),
                'role' => 'user'
            ]);

            $request->session()->flash('addUserMessage', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil menambahkan pengguna
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            return back();
        }
    }

    public function _deleteUser(Request $request) {
        $validator = Validator::make($request->query(),
        [
            'userId' => ['required', 'string', 'exists:users,user_id']
        ],
        [
            'userId.exist' => 'Pengguna tidak ditemukan'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $user = User::where('user_id', $request->query('userId'))
            ->limit(1);

        $user->delete();

        $request->session()->flash('deleteUserMessage', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menghapus pengguna
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        return back();
    }
}
