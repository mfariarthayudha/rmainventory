<!DOCTYPE html>
<html>

<head>
    <title>RMA Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <style>
        @media print {
            @page {
                size: A4;
                margin: 0;
                padding: 0;
            }

            body {
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
            transform: scale(1.2); /* Mengatur skala menjadi 120% */
            transform-origin: center; /* Mengatur titik asal skala menjadi sudut kiri atas */

        }
        }

        .form-check {
            min-height: 0rem;
            padding-left: 0em;
            margin-bottom: 0rem;
        }

        .form-check-label {
            color: red;
        }


        body,
        td,
        th,
        p,
        label {
            font-size: 7pt !important;
            margin: 0;
        }

        table,
        td,
        tr,
        tbody {
            padding: 0;
        }

        table * {
            padding: 0 !important;
        }

        .table {
            border: 1px solid black;
            padding: 0 !important;
        }

        /* Change the checkbox color when checked */
        .custom-checkbox:checked {
            background-color: black;
            border-color: black;
        }

        /* Optional: Change the color of the checkmark inside the checkbox */
        .custom-checkbox:checked::before {
            color: white;
        }

        /* Make the label bold when checkbox is checked */
        .custom-checkbox:checked+.form-check-label {
            font-weight: bold;
        }
    </style>
    <div class="card" style="border: 0 !important;">
        <div class="card-body">
            <div class="container ">
                <div class="container">
                    <div class="col-12">
                        <div class="text-center">
                            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                            <h6 class="mt-5"> RMA @if ($returnRequest->nomor_gr) ({{ $returnRequest->nomor_gr }}) @endif
                            </h6>
                            <h6 class="pt-0"> (Untuk Dilampirkan Pada Setiap Pengembalian Material ke Gudang)

                            </h6>
                        </div>

                    </div>



                    <div class="row  justify-content-center">
                        <table class="table">
                            <tbody style="padding: 0;">
                                <tr>
                                    <td class="no">1</td>
                                    <td class="nama">No.IO/SP2k/SO/PO/ANDOP</td>
                                    <td class="keterangan">: {{ $returnRequest->identifier }}</td>
                                </tr>
                                <tr>
                                    <td class="no">2</td>
                                    <td class="nama">Valuation Type</td>
                                    <td class="keterangan">: {{ $returnRequest->valuation_type }}</td>
                                </tr>
                                <tr>
                                    <td class="no">3</td>
                                    <td class="nama">Tanggal</td>
                                    <td class="keterangan">: {{ $returnRequest->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="no">4</td>
                                    <td class="nama">Lokasi Asal</td>
                                    <td class="keterangan">: {{ $returnRequest->origin }}</td>
                                </tr>
                                <tr>
                                    <td class="no">5</td>
                                    <td class="nama">Customer Name (CPE)</td>
                                    <td class="keterangan">: {{ $returnRequest->customer_name }}</td>
                                </tr>
                                <tr>
                                    <td class="no">6</td>
                                    <td class="nama">Merk</td>
                                    <td class="keterangan">: {{ $returnRequest->brand }}</td>
                                </tr>
                                <tr>
                                    <td class="no">7</td>
                                    <td class="nama">Type</td>
                                    <td class="keterangan">: {{ $returnRequest->type }}</td>
                                </tr>
                                <tr>
                                    <td class="no">8</td>
                                    <td class="nama">Serial Number (SN)/Batch</td>
                                    <td class="keterangan">: {{ $returnRequest->serial_number }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row d-flex justify-content-start">
                        <div class="col-12">
                            <span class="ms-3 text-start">Beri tanda Checker pada kotak jika Material rusak </span>
                            <input type="checkbox" class="form-check-input custom-checkbox" checked>
                        </div>

                        <div class="col-3">
                            <div class="form-check">
                                <span>07.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->continue_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Continue</label>
                            </div>

                            <div class="form-check">
                                <span>09.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->dead_on_arrival_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Dead on Arrival</label>
                            </div>
                            <div class="form-check">
                                <span>10.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->dead_on_operational_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Dead on Operational</label>
                            </div>
                            <div class="form-check">
                                <span>11.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox "
                                    @if ($returnRequest->ber_indicator_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">BER Indication</label>
                            </div>
                            <div class="form-check">
                                <span>12.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->software_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Software Error</label>
                            </div>
                            <div class="form-check">
                                <span>13.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->tributary_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Tributary Error</label>
                            </div>
                            <div class="form-check">
                                <span>14.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->channel_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Channel Error</label>
                            </div>
                            <div class="form-check">
                                <span>15.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->port_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Port Error</label>
                            </div>

                            <div class="form-check">
                                <span>16.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->laser_tx_faulty_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">TX Laser Faulty</label>
                            </div>

                            <div class="form-check">
                                <span>17.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->laser_rx_faulty_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">RX Laser Faulty</label>
                            </div>

                            <div class="form-check">
                                <span>18.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->physical_damage_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Pyshical Damage</label>
                            </div>

                            <div class="form-check">
                                <span>19.</span>
                                <input type="checkbox" class="form-check-input custom-checkbox"
                                    @if ($returnRequest->misscellaneous) checked @endif>
                                <label for="" class="form-check-label">Misscellaneous</label>
                                <td style="border: 1px solid black; width: 50%;">
                                    {{ $returnRequest->misscellaneous }}
                                </td>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="form-check">
                                <span>08.</span>
                                <input type="checkbox" class="form-check-input"
                                    @if ($returnRequest->intermitent_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Intermitent</label>
                            </div>

                            <div class="form-check">
                                <span>20.</span>
                                <input type="checkbox" class="form-check-input"
                                    @if ($returnRequest->rectifier_fault_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Rectifier/Inverter fault
                                    (Input/Output Voltage/Current Fault)</label>
                            </div>

                            <div class="form-check">
                                <span>21.</span>
                                <input type="checkbox" class="form-check-input"
                                    @if ($returnRequest->charging_switch_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Charging/Static Switch</label>
                            </div>

                            <div class="form-check">
                                <span>22.</span>
                                <input type="checkbox" class="form-check-input"
                                    @if ($returnRequest->battery_faulty_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Battery Faulty</label>
                            </div>

                            <table>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <span>23.</span>
                                            <input type="checkbox" class="form-check-input"
                                                   @if ($returnRequest->number_of_tribu > 1) checked @endif>
                                            <label for="" class="form-check-label1">Number of Tribu :</label>
                                        </div>
                                    </td>

                                    <td style="border: 1px solid black; width: 50%;">
                                        {{ $returnRequest->number_of_tribu }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <span>24.</span>
                                            <input type="checkbox" class="form-check-input"
                                                   @if ($returnRequest->number_of_char > 1) checked @endif>
                                            <label for="" class="form-check-label1">Number of Char :</label>
                                        </div>
                                    </td>

                                    <td style="border: 1px solid black; width: 50%;">
                                        {{ $returnRequest->number_of_char }}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <span>25.</span>
                                            <input type="checkbox" class="form-check-input"
                                                   @if ($returnRequest->number_of_port > 1) checked @endif>
                                            <label for="" class="form-check-label1">Number of Port :</label>
                                        </div>
                                    </td>

                                    <td style="border: 1px solid black; width: 50%;">
                                        {{ $returnRequest->number_of_port }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-2">

                        </div>
                    </div>

                    <div class="form-check">
                        <span>19.</span>
                        <input type="checkbox" class="form-check-input custom-checkbox"
                               @if ($returnRequest->misscellaneous) checked @endif>
                        <label for="" class="form-check-label">Misscellaneous : </label>
                        <span class="border border-dark d-inline-block" style="width: 100px">
                            .{{ $returnRequest->misscellaneous }}
                        </span>
                    </div>

                    <div class="row">
                        <div class="col-1">

                        </div>
                        <div class="col-4">
                            <p>Foto Material :</p>

                            <div class="row">
                                <div class="col-6">
                                    @if ($returnRequest->material_picture_1)
                                        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $returnRequest->material_picture_1))) }}"
                                            alt="" style="max-width: 150px; max-height: 150px;">
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">

                                @if ($returnRequest->material_picture_2)
                                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $returnRequest->material_picture_2))) }}"
                                        alt="" style="max-width: 150px; max-height: 150px;">
                                @endif
                            </div>
                        </div>


                        <div class="col-7">
                            <div class="notice">Note:</div>
                            <div class="notice">Continue : Indikasi eror terjadi permanent / terus menerus.</div>
                            <div class="notice">Intermitent : Indikasi eror terjadi kadang-kadang sangat random
                            </div>
                            <div class="notice">Dead on Arrival : Perangkat mati total/rusak pada jangka waktu 24
                                jam setelah pemasangan</div>
                            <div class="notice">Dead on Operational : Perangkat mati total/rusak pada saat
                                beroperasi normal</div>
                            <div class="notice">BER Indication : Indikasi error pada display modul/NMS/hasil
                                bertest (disertakan no trip yang error)</div>
                            <div class="notice">Software Error : Gangguan yang disebabkan firmware/IOS/internet
                                EPROM</div>
                            <div class="notice">Tributary Error : Low order modul error (PDH/SDH)</div>
                            <div class="notice">Port Error : Port membangkitkan error/mati total (IP network
                                family, converter)</div>
                            <div class="notice">Tx Laser Faulty : Only Optical Modul TX Loss, No Signal</div>
                            <div class="notice">Rx Laser Faulty : Only Optical Modul No.Rx. Frame error</div>
                            <div class="notice">Pyshical Damage : Rusak physic perangkat, benturan, short circuit,
                                liquid</div>
                            <div class="notice">Miscellaneous : Sebab lain yang tidak tertulis di atas</div>

                        </div>

                    </div>
                    <div class="row">

                        <div class="col-4 mt-5">
                            <div>Engineer Sign</div>
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/' . $creator->signature))) }}"
                                alt="" style="max-width: 100px; max-height: 100px;">
                            <div>{{ $creator->username }}</div>
                        </div>

                        <div class="col-2">
                        </div>

                        <div class="col-4 mt-5 d-flex flex-column justify-content-between">
                            <div>Manager on duty / supervisor sign</div>

                            <p>Name : </p>
                        </div>

                        <div class="col-2">
                            <p>Master : Inventory<br>
                            Copy : Technical Adm</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
    window.onload = function() {
        window.print();
    };
</script>
