<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ReturnRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/unnotified-request', function (Request $request) {
    $unnotifiedRequest = ReturnRequest::select('return_request_id', 'customer_name')
        ->where('admin_notified', 0)
        ->get();

    function getRequestId($returnRequest) {
        return $returnRequest['return_request_id'];
    }

    $requestId = array_map('getRequestId', $unnotifiedRequest->toArray());

    // ReturnRequest::whereIn('return_request_id', $requestId)
    //     ->update(['admin_notified' => 1]);

    return $unnotifiedRequest;
});
