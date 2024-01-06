<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                'username' => ['required', 'string', 'max:32', Rule::unique('users')->where(fn ($query) => $query->where('username', $request->input('username'))->where('deleted_at', null))],
                'signature' => ['required', 'image'],
                'password' => ['required', 'string'],
                'passwordConfirmation' => ['required', 'string', 'same:password']
            ],
            [
                'username.required' => 'Nama Pengguna tidak boleh kosong',
                'username.string' => 'Nama Pengguna harus berupa string',
                'username.max' => 'Nama Pengguna tidak boleh lebih dari 32 karakter',
                'username.unique' => 'Nama Pengguna sudah terdaftar',
                'signature.required' => 'Tanda Tangan tidak boleh kosong',
                'password.required' => 'Kata Sandi tidak boleh kosong',
                'password.string' => 'Kata Sandi harus berupa string',
                'passwordConfirmation.required' => 'Konfirmasi Kata Sandi tidak boleh kosong',
                'passwordConfirmation.string' => 'Konfirmasi Kata Sandi harus berupa string',
                'passwordConfirmation.same' => 'Konfirmasi Kata Sandi harus sama dengan kata Sandi'
            ]);

            $signaturePath = $request->file('signature')->store('uploaded-files', 'public');

            User::create([
                ...$userData,
                'password' => Hash::make($userData['password'], [
                    'rounds' => 10
                ]),
                'role' => 'user',
                'signature' => $signaturePath
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
