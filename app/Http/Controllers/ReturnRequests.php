<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnRequests extends Controller {
    public function index(Request $request) {
        return view('admin.return-request', [
            'user' => $request->user()
        ]);
    }
}
