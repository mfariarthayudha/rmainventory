<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnRequest;

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

    public function _create(Request $request) {
        if ($request->user()->role == 'user') {
            $data = $request->validate([
                'identifier' => ['required', 'string', 'max:64'],
                'valuation_type' => ['required', 'string', 'max:16'],
                'origin' => ['required', 'string', 'max:64'],
                'customer_name' => ['required', 'string', 'max:128'],
                'type' => ['required', 'string', 'max:128'],
                'brand' => ['required', 'string', 'max:128'],
                'serial_number' => ['required', 'string', 'max:32'],
                'material_picture' => ['required', 'image']
            ]);

            $materialPicturePath = $request->file('material_picture')->store('uploaded-files');

            ReturnRequest::create([
                ...$data,
                'created_by' => $request->user()->user_id,
                'material_picture' => $materialPicturePath,
                'request_status' => 'pending'
            ]);

            $request->session()->flash('addReturnRequestMessage', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil menambahkan pengembalian
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ');

            return back();
        }
    }
}
