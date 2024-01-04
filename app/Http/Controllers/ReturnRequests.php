<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ReturnRequest;


class ReturnRequests extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('status', 'all');

        if ($request->user()->role == 'admin') {
            if ($filter == 'all') {
                $returnRequests = ReturnRequest::orderBy('created_at', 'desc')
                    ->get();
            } else {
                $returnRequests = ReturnRequest::where('request_status', $filter)
                    ->orderBy('created_at', 'desc')
                    ->get();
            }

            return view('admin.return-request', [
                'user' => $request->user(),
                'status' => $filter,
                'returnRequests' => $returnRequests
            ]);
        } elseif ($request->user()->role == 'user') {
            if ($filter == 'all') {
                $returnRequests = ReturnRequest::where('created_by', $request->user()->user_id)
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $returnRequests = ReturnRequest::where('created_by', $request->user()->user_id)
                    ->where('request_status', $filter)
                    ->orderBy('created_at', 'desc')
                    ->get();
            }

            return view('user.return-request', [
                'user' => $request->user(),
                'status' => $filter,
                'returnRequests' => $returnRequests
            ]);
        }
    }

    public function create(Request $request)
    {
        if ($request->user()->role == 'user') {
            return view('user.return-request-form', [
                'user' => $request->user()
            ]);
        }
    }

    public function detail(Request $request)
    {
        // $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))->first();
        // var_dump($returnRequest); 
    
        if ($request->user()->role == 'admin') {
            return view('admin.return-request-detail', [
                'user' => $request->user(),
                'returnRequest' => ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                    ->first()
            ]);
        } elseif ($request->user()->role == 'user') {
            return view('user.return-request-detail', [
                'user' => $request->user(),
                'returnRequest' => ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                    ->first()
            ]);
        }
    }

    public function _create(Request $request)
    {
        if ($request->user()->role == 'user') {
            $data = $request->validate([
                'identifier' => ['required', 'string', 'max:64'],
                'valuation_type' => ['required', 'string', 'max:16'],
                'origin' => ['required', 'string', 'max:64'],
                'customer_name' => ['required', 'string', 'max:128'],
                'type' => ['required', 'string', 'max:128'],
                'brand' => ['required', 'string', 'max:128'],
                'serial_number' => ['required', 'string', 'max:32'],
                'material_picture' => ['required', 'image'],
                'continue_chekbox' => ['string', 'max:1'],
                'dead_on_arrival_checkbox' => ['string', 'max:1'],
                'dead_on_operational_checkbox' => ['string', 'max:1'],
                'ber_indicator_checkbox' => ['string', 'max:1'],
                'software_error_checkbox' => ['string', 'max:1'],
                'tributary_error_checkbox' => ['string', 'max:1'],
                'channel_error_checkbox' => ['string', 'max:1'],
                'port_error_checkbox' => ['string', 'max:1'],
                'laset_tx_faulty_checkbox' => ['string', 'max:1'],
                'physical_damage_checkbox' => ['string', 'max:1'],
                'intermitent_checkbox' => ['string', 'max:1'],
                'rectifier_fault_checkbox' => ['string', 'max:1'],
                'charging_switch_checkbox' => ['string', 'max:1'],
                'battery_faulty_checkbox' => ['string', 'max:1'],
                'misscellaneous' => ['max:2048'],
            ]);

            // $materialPicturePath = asset($request->file('material_picture')->store('uploaded-files'));
            // // $materialPicturePath = $request->file('material_picture')->store('uploaded-files', 'public');

            // $materialPicturePath = $request->file('material_picture')->store('uploaded-files');
            $materialPicturePath = $request->file('material_picture')->store('uploaded-files', 'public');

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

            return redirect('/return-requests');
        }
    }

    public function _approve(Request $request)
    {
        $validator = Validator::make(
            $request->query(),
            [
                'returnRequestId' => ['required', 'string', 'exists:return_requests,return_request_id']
            ],
            [
                'returnRequestId.exist' => 'Pengembalian tidak ditemukan'
            ]
        );

        if ($validator->fails()) {
            return redirect('/return-requests')->withErrors($validator);
        }

        $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
            ->first();

        $returnRequest->request_status = 'approved';
        $returnRequest->save();

        $request->session()->flash('approveReturnRequestMessage', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menerima pengembalian
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        return redirect('/return-requests');
    }

    public function _reject(Request $request)
    {
        $validator = Validator::make(
            $request->query(),
            [
                'returnRequestId' => ['required', 'string', 'exists:return_requests,return_request_id']
            ],
            [
                'returnRequestId.exist' => 'Pengembalian tidak ditemukan'
            ]
        );

        if ($validator->fails()) {
            return redirect('/return-requests')->withErrors($validator);
        }

        $request->validate(
            [
                'rejection_reason' => ['required', 'string', 'max:2048']
            ],
            [
                'rejection_reason.required' => 'Alasan Penolakan tidak boleh kosong',
                'rejection_reason.max' => 'Alasan Penolakan maksimal 2048 karakter'
            ]
        );

        $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
            ->first();

        $returnRequest->request_status = 'rejected';
        $returnRequest->rejection_reason = $request->query('rejection_reason');
        $returnRequest->save();

        $request->session()->flash('rejectReturnRequestMessage', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menolak pengembalian
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        return redirect('/return-requests');
    }

    public function exportPDF()
    {
        $returnRequests = //ambildatabasefari
            $pdf = PDF::loadView('return-request-pdf', compact('returnRequests'));

        return $pdf->download('daftar_pengembalian.pdf');
    }
}
