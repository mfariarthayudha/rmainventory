<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnRequests extends Controller {
    public function index(Request $request) {
        if ($request->user()->role == 'admin') {
            return view('admin.return-request', [
                'user' => $request->user()
            ]);
        } elseif ($request->user()->role == 'user') {
            return view('user.return-request', [
                'user' => $request->user()
            ]);
        }
        
    }
}
