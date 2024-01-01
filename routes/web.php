<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Admin::class, 'index']);

Route::get('users', [Admin::class, 'users']);

Route::prefix('authentication')->group(function() {
    Route::view('login', 'authentication.login');
    Route::post('_login', [Authentication::class, '_login']);
});
