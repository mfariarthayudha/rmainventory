<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Users;

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

Route::middleware(['mustAuthenticated'])->group(function() {
    Route::post('/users/_add-user', [Users::class, '_addUser']);
    Route::get('/users/_delete-user', [Users::class, '_deleteUser']);
    Route::get('/users', [Users::class, 'index']);

    Route::get('return', [Dashboard::class, 'return']);
    Route::get('/', [Dashboard::class, 'index']);
});


Route::middleware(['mustNotAuthenticated'])->prefix('authentication')->group(function() {
    Route::get('login', [Authentication::class, 'login']);
    Route::post('_login', [Authentication::class, '_login']);
});
