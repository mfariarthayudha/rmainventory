<?php
date_default_timezone_set('asia/jakarta');
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>RMA Inventory {{ $returnRequest->identifier }}</title>

    <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
    <link href="/sb-admin-pro/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/sb-admin-pro/assets/img/favicon.png" />

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<style>
    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #5D6975;
        text-decoration: underline;
    }

    body {
        position: relative;
        /* width: 21cm;
        height: 29.7cm; */
        margin: 0 auto;
        color: #001028;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 12px;
        font-family: Arial;
    }

    header {
        /* padding: 10px 0; */
        /* margin-bottom: 30px; */
    }

    /* Bagian Tambahan */
    .container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        /* Untuk memberikan jarak antara kolom */
        align-items: flex-start;
        /* Untuk menempatkan konten ke atas */
    }

    /* Style untuk Text Content dan Image Content */
    .text-content,
    .image-content {
        width: 48%;
        /* Sesuaikan lebar masing-masing kolom */
        padding: 0 10px;
        /* Tambahkan padding agar konten tidak terlalu dekat dengan tepi */
    }

    /* Penyesuaian gaya untuk text-content */
    .text-content {
        order: 1;
        /* Untuk menempatkan text-content di sebelah kiri */
    }

    /* Penyesuaian gaya untuk image-content */
    .image-content {
        order: 2;
        /* Untuk menempatkan image-content di sebelah kanan */
    }


    h1 {
        margin-top: -30px;
        padding-top: -50px;
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        background: url(dimension.png);
    }

    h2 {
        margin-top: -20px;

        color: #5D6975;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
    }

    h3 {
        color: #5D6975;
        line-height: 1em;
        font-weight: normal;
        text-align: center;
    }



    .form-check {
        margin-bottom: 2px;
        position: relative;
    }

    .form-check-textarea {
        width: calc(100% - 40px);
        /* Adjust the width as needed */
        margin: 0 auto;
        display: block;
        padding: 10px;
        /* Adjust padding as needed */
        margin-top: 5px;
        /* Adjust margin-top as needed */
    }



    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #C1CED9;

    }

    table tr:nth-child(2n-1) td {
        background: #F5F5F5;
    }

    table th,
    table td {
        text-align: center;
    }

    table th {
        /* padding: 5px 20px; */
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;
        font-weight: normal;
        text-align: left;

    }

    table .no,
    table .nama {
        text-align: left;
    }

    table td {
        padding: 5px;
        text-align: left;
    }

    table td.no,
    table td.nama {
        vertical-align: top;
    }

    table td.keterangan,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table td.grand {
        border-top: 1px solid #5D6975;
        ;
    }

    #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
    }

    footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
    }

    .form-check {
        margin-bottom: 2px;
    }

    .form-check span {
        display: inline-block;
        width: 30px;
        text-align: right;
        margin-right: 5px;
    }

    .form-check label {
        margin-left: 5px;
        display: inline-block;
        vertical-align: top;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
</style>

<body class="nav-fixed">

    <header class="clearfix">
        <!-- <div id="logo">
      <img src="{{ asset('images/header.png') }}" alt="PLN Logo" height="150px">
      </div> -->
        <h1>Return Material Authorization </h1>
        <!-- <h2>(RMA) </h2> -->
        <h2>(Untuk Dilampirkan Pada Setiap Pengembalian Material ke Gudang) </h2>
    </header>

    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <!-- Main page content-->
            <main>
                <table>
                    <thead>
                        <tr>
                            <th class="no">No</th>
                            <th class="nama">Nama</th>
                            <th>Keterangan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">1</td>
                            <td class="nama">No.IO/SP2k/SO/PO/ANDOP</td>
                            <td class="keterangan">{{ $returnRequest->identifier }}</td>
                        </tr>
                        <tr>
                            <td class="no">2</td>
                            <td class="nama">Valuation Type</td>
                            <td class="keterangan">{{ $returnRequest->valuation_type }}</td>
                        </tr>
                        <tr>
                            <td class="no">3</td>
                            <td class="nama">Tanggal</td>
                            <td class="keterangan">{{ $returnRequest->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="no">4</td>
                            <td class="nama">Lokasi Asal</td>
                            <td class="keterangan">{{ $returnRequest->origin }}</td>
                        </tr>
                        <tr>
                            <td class="no">5</td>
                            <td class="nama">Customer Name (CPE)</td>
                            <td class="keterangan">{{ $returnRequest->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="no">6</td>
                            <td class="nama">Merk</td>
                            <td class="keterangan">{{ $returnRequest->brand }}</td>
                        </tr>
                        <tr>
                            <td class="no">7</td>
                            <td class="nama">Type</td>
                            <td class="keterangan">{{ $returnRequest->type }}</td>
                        </tr>
                        <tr>
                            <td class="no">8</td>
                            <td class="nama">Serial Number (SN)/Batch</td>
                            <td class="keterangan">{{ $returnRequest->serial_number }}</td>
                        </tr>

                    </tbody>
                </table>

                <div class="container clearfix" style="display: block;">
                    <div class="checkbox-content">
                        <h3>Beri tanda Checker pada kotak jika Material rusak </h3>

                        <div style="width: 50%; float: left;">
                            <div class="form-check">
                                <span>07.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->continue_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Continue</label>
                            </div>
                            <div class="form-check">
                                <span>08.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->intermitent_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Intermitent</label>
                            </div>
                            <div class="form-check">
                                <span>09.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->dead_on_arrival_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Dead on Arrival</label>
                            </div>
                            <div class="form-check">
                                <span>10.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->dead_on_operational_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Dead on Operational</label>
                            </div>
                            <div class="form-check">
                                <span>11.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->ber_indicator_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">BER Indication</label>
                            </div>
                            <div class="form-check">
                                <span>12.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->software_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Software Error</label>
                            </div>
                            <div class="form-check">
                                <span>13.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->tributary_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Tributary Error</label>
                            </div>
                            <div class="form-check">
                                <span>14.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->channel_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Channel Error</label>
                            </div>
                            <div class="form-check">
                                <span>15.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->port_error_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Port Error</label>
                            </div>

                        </div>

                        <div style="width: 50%; float: right;">
                            <div class="form-check">
                                <span>16.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->laser_tx_faulty_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Tx Laser Faulty</label>
                            </div>
                            <div class="form-check">
                                <span>18.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->physical_damage_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Pyshical Damage</label>
                            </div>
                            <div class="form-check">
                                <span>19.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->rectifier_fault_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Rectifier/Inverter fault (Input/Output Voltage/Current Fault)</label>
                            </div>

                            <div class="form-check">
                                <span>20.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->charging_switch_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Charging/Static Switch</label>
                            </div>

                            <div class="form-check">
                                <span>21.</span>
                                <input type="checkbox" class="form-check-input" @if ($returnRequest->battery_faulty_checkbox == 1) checked @endif>
                                <label for="" class="form-check-label">Battery Faulty</label>
                            </div>

                            <div class="form-check">
                                <span>22.</span>
                                <label for="" class="form-check-label">Number of Tribu : {{ $returnRequest->number_of_tribu }}</label>
                            </div>

                            <div class="form-check">
                                <span>23.</span>
                                <label for="" class="form-check-label">Number of Char : {{ $returnRequest->number_of_char }}</label>
                            </div>

                            <div class="form-check">
                                <span>24.</span>
                                <label for="" class="form-check-label">Number of Port : {{ $returnRequest->number_of_port }}</label>
                            </div>

                            <div class="form-check">
                                <span>25.</span>
                                <label for="" class="form-check-label">Note</label>
                                <input type="text" id="" value="{{ $returnRequest->misscellaneous }}" class="form-check-input">
                            </div>
                        </div>
                    </div>

                </div>
                <br>


                <div class="row">
                    <div class="imagetext-content">
                        <div style="width: 50%; float: left;">
                        <div>Foto Material :</div>

                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/" . $returnRequest->material_picture))) }}" alt="" style="max-width: 100px; max-height: 100px;">
                       
                       <br>
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path("storage/" . $creator->signature))) }}" alt="" style="max-width: 100px; max-height: 100px;">
                            <div>{{ $creator->username }}</div>
                        </div>

                        <div style="width: 50%; float: left;">
                            <div class="notice">Note:</div>
                            <div class="notice">Continue : Indikasi eror terjadi permanent / terus menerus.</div>
                            <div class="notice">Intermitent : Indikasi eror terjadi kadang-kadang sangat random</div>
                            <div class="notice">Dead on Arrival : Perangkat mati total/rusak pada jangka waktu 24 jam setelah pemasangan</div>
                            <div class="notice">Dead on Operational : Perangkat mati total/rusak pada saat beroperasi normal</div>
                            <div class="notice">BER Indication : Indikasi error pada display modul/NMS/hasil bertest (disertakan no trip yang error)</div>
                            <div class="notice">Software Error : Gangguan yang disebabkan firmware/IOS/internet EPROM</div>
                            <div class="notice">Tributary Error : Low order modul error (PDH/SDH)</div>
                            <div class="notice">Port Error : Port membangkitkan error/mati total (IP network family, converter)</div>
                            <div class="notice">Tx Laser Faulty : Only Optical Modul TX Loss, No Signal</div>
                            <div class="notice">Rx Laser Faulty : Only Optical Modul No.Rx. Frame error</div>
                            <div class="notice">Pyshical Damage : Rusak physic perangkat, benturan, short circuit, liquid</div>
                            <div class="notice">Miscellaneous : Sebab lain yang tidak tertulis di atas</div>

                        </div>

                    </div>

                    <div style="clear: both;"></div>

                </div>
        </div>





        </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/sb-admin-pro/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
    <script src="/sb-admin-pro/js/litepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="/sb-admin-pro/js/datatables/datatables-simple-demo.js"></script>
</body>

</html>