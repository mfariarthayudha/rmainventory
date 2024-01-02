<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnRequest;

class Dashboard extends Controller {
    public function index(Request $request) {
        if ($request->user()->role == 'admin') {
            return view('admin.dashboard', [
                'user' => $request->user(),
                'totalReturnRequest' => ReturnRequest::count(),
                'pendingReturnRequest' => ReturnRequest::where('request_status', 'pending')
                    ->count(),
                'approvedReturnRequest' => ReturnRequest::where('request_status', 'approved')
                    ->count(),
                'rejectedReturnRequest' => ReturnRequest::where('request_status', 'rejected')
                    ->count()
            ]);
        }
    }
}
