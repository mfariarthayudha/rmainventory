<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller {
    public function index(Request $request) {
        return view('admin.dashboard');
    }

    public function return(Request $request) {
        return view('admin.return');
    }

    public function users(Request $request) {
        return view('admin.user');
    }
}
