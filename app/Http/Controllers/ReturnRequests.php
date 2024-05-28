<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ReturnRequest;
use App\Exports\ReturnRequestExport;
use App\Models\User;

class ReturnRequests extends Controller
{
    public function index(Request $request)
    {
        $filter;

        if ($request->has('status')) {
            $filter = $request->query('status');
            $request->session()->put('filter', $filter);
        } else {
            $filter = $request->session()->get('filter', 'all');
        }

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

    public function edit(Request $request)
    {
        if ($request->user()->role == 'user') {
            return view('user.return-request-edit', [
                'user' => $request->user(),
                'returnRequest' => ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                    ->first()
            ]);
        }
    }

    public function detail(Request $request)
    {
        // $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))->first();
        // var_dump($returnRequest); 

        if ($request->user()->role == 'admin') {
            $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                ->first();

            return view('admin.return-request-detail', [
                'user' => $request->user(),
                'returnRequest' => $returnRequest,
                'creator' => User::where('user_id', $returnRequest->created_by)
                    ->first()
            ]);
        } elseif ($request->user()->role == 'user') {
            $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                ->first();

            return view('user.return-request-detail', [
                'user' => $request->user(),
                'returnRequest' => $returnRequest,
                'creator' => User::where('user_id', $returnRequest->created_by)
                    ->first()
            ]);
        }
    }

    public function _create(Request $request)
    {
        date_default_timezone_set('asia/jakarta');

        if ($request->user()->role == 'user') {
            $data = $request->validate([
                'identifier' => ['required', 'string', 'max:64'],
                'valuation_type' => ['required', 'string', 'max:16'],
                'origin' => ['required', 'string', 'max:64'],
                'customer_name' => ['required', 'string', 'max:128'],
                'type' => ['required', 'string', 'max:128'],
                'brand' => ['required', 'string', 'max:128'],
                'serial_number' => ['required', 'string', 'max:32'],
                'material_picture_1' => ['required', 'image'],
                'material_picture_2' => ['required', 'image'],
                'continue_checkbox' => ['string', 'max:1'],
                'dead_on_arrival_checkbox' => ['string', 'max:1'],
                'dead_on_operational_checkbox' => ['string', 'max:1'],
                'ber_indicator_checkbox' => ['string', 'max:1'],
                'software_error_checkbox' => ['string', 'max:1'],
                'tributary_error_checkbox' => ['string', 'max:1'],
                'channel_error_checkbox' => ['string', 'max:1'],
                'port_error_checkbox' => ['string', 'max:1'],
                'laser_tx_faulty_checkbox' => ['string', 'max:1'],
                'laser_rx_faulty_checkbox' => ['string', 'max:1'],
                'physical_damage_checkbox' => ['string', 'max:1'],
                'intermitent_checkbox' => ['string', 'max:1'],
                'rectifier_fault_checkbox' => ['string', 'max:1'],
                'charging_switch_checkbox' => ['string', 'max:1'],
                'battery_faulty_checkbox' => ['string', 'max:1'],
                'number_of_tribu' => ['min:0'],
                'number_of_char' => ['min:0'],
                'number_of_port' => ['min:0'],
                'misscellaneous' => ['max:2048'],
            ]);

            // $materialPicturePath = asset($request->file('material_picture')->store('uploaded-files'));
            // // $materialPicturePath = $request->file('material_picture')->store('uploaded-files', 'public');

            // $materialPicturePath = $request->file('material_picture')->store('uploaded-files');
            $materialPicture1Path = $request->file('material_picture_1')->store('uploaded-files', 'public');
            $materialPicture2Path = $request->file('material_picture_2')->store('uploaded-files', 'public');


            ReturnRequest::create([
                ...$data,
                'created_by' => $request->user()->user_id,
                'material_picture_1' => $materialPicture1Path,
                'material_picture_2' => $materialPicture2Path,
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

    public function _edit(Request $request)
    {
        date_default_timezone_set('asia/jakarta');

        if ($request->user()->role == 'user') {
            $data = $request->validate([
                'valuation_type' => ['required', 'string', 'max:16'],
                'origin' => ['required', 'string', 'max:64'],
                'customer_name' => ['required', 'string', 'max:128'],
                'type' => ['required', 'string', 'max:128'],
                'brand' => ['required', 'string', 'max:128'],
                'serial_number' => ['required', 'string', 'max:32'],
                'material_picture_1' => ['image'],
                'material_picture_2' => ['image'],
                'continue_checkbox' => ['string', 'max:1'],
                'dead_on_arrival_checkbox' => ['string', 'max:1'],
                'dead_on_operational_checkbox' => ['string', 'max:1'],
                'ber_indicator_checkbox' => ['string', 'max:1'],
                'software_error_checkbox' => ['string', 'max:1'],
                'tributary_error_checkbox' => ['string', 'max:1'],
                'channel_error_checkbox' => ['string', 'max:1'],
                'port_error_checkbox' => ['string', 'max:1'],
                'laser_tx_faulty_checkbox' => ['string', 'max:1'],
                'laser_rx_faulty_checkbox' => ['string', 'max:1'],
                'physical_damage_checkbox' => ['string', 'max:1'],
                'intermitent_checkbox' => ['string', 'max:1'],
                'rectifier_fault_checkbox' => ['string', 'max:1'],
                'charging_switch_checkbox' => ['string', 'max:1'],
                'battery_faulty_checkbox' => ['string', 'max:1'],
                'number_of_tribu' => ['min:0'],
                'number_of_char' => ['min:0'],
                'number_of_port' => ['min:0'],
                'misscellaneous' => ['max:2048'],
            ]);

            // $materialPicturePath = asset($request->file('material_picture')->store('uploaded-files'));
            // // $materialPicturePath = $request->file('material_picture')->store('uploaded-files', 'public');

            // $materialPicturePath = $request->file('material_picture')->store('uploaded-files');


            if ($request->hasFile('material_picture_1')) {
                $data['material_picture_1'] = $request->file('material_picture_1')->store('uploaded-files', 'public');
            }

            if ($request->hasFile('material_picture_2')) {
                $data['material_picture_2'] = $request->file('material_picture_2')->store('uploaded-files', 'public');
            }

            ReturnRequest::where('return_request_id', $request->input('return_request_id'))
                ->update([
                    ...$data,
                    'created_by' => $request->user()->user_id,
                    'request_status' => 'pending',
                    'resubmited_at' => date('Y-m-d H:i:s')
                ]);

            $request->session()->flash('addReturnRequestMessage', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Berhasil mengedit pengembalian
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
                'returnRequestId' => ['required', 'string', 'exists:return_requests,return_request_id'],
                'nomor_gr' => ['required', 'string', 'max:2048']
            ],
            [
                'returnRequestId.exist' => 'Pengembalian tidak ditemukan',
                'nomor_gr.required' => 'Nomor GR tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return redirect('/return-requests')->withErrors($validator);
        }

        $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
            ->first();

        $returnRequest->request_status = 'approved';
        $returnRequest->nomor_gr = $request->query('nomor_gr');
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
        date_default_timezone_set('Asia/Jakarta');

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
        if ($returnRequest->rejected_at == NULL) {
            $returnRequest->rejected_at = date('Y-m-d H:i:s');
        } else {
            $returnRequest->rerejected_at = date('Y-m-d H:i:s');
        }
        $returnRequest->save();

        $request->session()->flash('rejectReturnRequestMessage', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil menolak pengembalian
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');

        return redirect('/return-requests');
    }

    public function _exportExcel(Request $request)
    {
        if ($request->user()->role == 'admin') {
            return view('admin.return-request-excel', [
                'user' => $request->user(),
                'returnRequests' => ReturnRequest::orderBy('created_at', 'desc')
                    ->get()
            ]);
        }
    }

    public function _exportPdf(Request $request)
    {
        if ($request->user()->role == 'admin') {
            $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))
                ->first();

            $creator = User::where('user_id', $returnRequest->created_by)
                ->first();

            // Load the view file
            $data = [
                'returnRequest' => $returnRequest,
                'creator' => $creator
            ];

            $pdf = new Dompdf();
            $pdf->setOptions(new Options(['isHtml5ParserEnabled' => true]));

            // Load HTML content from a Blade view
            $html = View::make('return-request-pdf', $data)->render();

            $pdf->loadHtml($html);

            // Render the PDF
            $pdf->render();

            // Download the generated PDF file
            if ($returnRequest->nomor_gr != null) {
                return $pdf->stream($returnRequest->nomor_gr . '.pdf');
            } else {
                return $pdf->stream('return_request.pdf');
            }
        }
    }


    public function exportPDF(Request $request)
    {
        if ($request->user()->role == 'admin') {
            $returnRequest = ReturnRequest::where('return_request_id', $request->query('returnRequestId'))->first();
            $creator = User::where('user_id', $returnRequest->created_by)->first();
    
            return view('return-request-pdf-new', [
                'returnRequest' => $returnRequest,
                'creator' => $creator
            ]);
        }
    }
}
