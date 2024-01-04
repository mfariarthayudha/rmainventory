<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\ReturnRequests;
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
    Route::prefix('/return-requests')->group(function() {
        Route::post('/_create', [ReturnRequests::class, '_create']);
        Route::get('/_approve', [ReturnRequests::class, '_approve']);
        Route::get('/_reject', [ReturnRequests::class, '_reject']);
        Route::get('/_export-excel', [ReturnRequests::class, '_exportExcel']);

        Route::get('/create', [ReturnRequests::class, 'create']);
        Route::get('/detail', [ReturnRequests::class, 'detail']);
        Route::get('/', [ReturnRequests::class, 'index']);
    });

    Route::prefix('/users')->group(function() {
        Route::post('/_add-user', [Users::class, '_addUser']);
        Route::get('/_delete-user', [Users::class, '_deleteUser']);
        Route::get('/', [Users::class, 'index']);
    }); 
    
    Route::get('/', [Dashboard::class, 'index']);
});


Route::middleware(['mustNotAuthenticated'])->prefix('/authentication')->group(function() {
    Route::post('/_login', [Authentication::class, '_login']);
    Route::get('/_logout', [Authentication::class, '_logout'])->withoutMiddleware(['mustNotAuthenticated']);

    Route::get('/login', [Authentication::class, 'login']);
});

Route::get('/return-requests/export-pdf', 'ReturnRequestController@exportPDF')->name('return-requests.export-pdf');

