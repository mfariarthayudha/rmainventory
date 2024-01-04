<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RMA (Isi tarik Nama atau nomer Kali ya ri)</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    h1 {
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

    #logo {
  text-align: center;
  /* margin-bottom: 10px; */
}

#logo img {
  width: 90px;
}
    #project {
        float: left;
    }

    .form-check {
        margin-bottom: 10px;
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


    #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
    }

    #company {
        float: right;
        text-align: right;
    }

    #project div,
    #company div {
        white-space: nowrap;
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
        margin-bottom: 10px;
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
</style>

<body>
    <header class="clearfix">
        <!-- <div id="logo">
      <img src="{{ asset('images/header.png') }}" alt="PLN Logo" height="150px">
      </div> -->
        <h1>Return Material Authorization </h1>
        <h2>(RMA) </h2>
        <h2>(Untuk Dilampirkan Pada Setiap Pengembalian Material ke Gudang) </h2>


    </header>
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
                    <td class="keterangan">Isian Nomor</td>
                </tr>
                <tr>
                    <td class="no">2</td>
                    <td class="nama">Valuation Type</td>
                    <td class="keterangan">Isian Valuation</td>
                </tr>
                <tr>
                    <td class="no">3</td>
                    <td class="nama">Tanggal</td>
                    <td class="keterangan">Isian</td>
                </tr>
                <tr>
                    <td class="no">4</td>
                    <td class="nama">Lokasi Asal</td>
                    <td class="keterangan">Isian</td>
                </tr>
                <tr>
                    <td class="no">5</td>
                    <td class="nama">Customer Name (CPE)</td>
                    <td class="keterangan">Isian</td>
                </tr>
                <tr>
                    <td class="no">6</td>
                    <td class="nama">Merk</td>
                    <td class="keterangan">Isian</td>
                </tr>
                <tr>
                    <td class="no">7</td>
                    <td class="nama">Type</td>
                    <td class="keterangan">Isian</td>
                </tr>
                <tr>
                    <td class="no">8</td>
                    <td class="nama">Serial Number (SN)/Batch</td>
                    <td class="keterangan">Isian</td>
                </tr>

            </tbody>
        </table>

        <div class="container">
            <div class="row">
                <h3>Beri tanda Checker pada kotak jika Material rusak </h3>

                <div class="col-6">
                <div class="form-check">
                        <span>07.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Continue</label>
                    </div>
                    <div class="form-check">
                        <span>08.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Intermitent</label>
                    </div>
                    <div class="form-check">
                        <span>09.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Dead on Arrival</label>
                    </div>
                    <div class="form-check">
                        <span>10.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Dead on Operational</label>
                    </div>
                    <div class="form-check">
                        <span>11.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">BER Indication</label>
                    </div>
                    <div class="form-check">
                        <span>12.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Software Error</label>
                    </div>
                    <div class="form-check">
                        <span>13.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Tributary Error</label>
                    </div>
                    <div class="form-check">
                        <span>14.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Channel Error</label>
                    </div>
                    <div class="form-check">
                        <span>15.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Port Error</label>
                    </div>
                    <div class="form-check">
                        <span>16.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Tx Laser Faulty</label>
                    </div>
                    <div class="form-check">
                        <span>17.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Rx Laser Faulty</label>
                    </div>
                    <div class="form-check">
                        <span>18.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Pyshical Damage</label>
                    </div>
                    <div class="form-check">
                        <span>19.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Miscellaneous</label>
                        <!-- <textarea class="form-check-textarea" name="" id="" cols="30" rows="10"></textarea> -->
                    </div>

                </div>


                <div class="col-6">
                    <div class="form-check">
                        <span>20.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Rectifier/Inverter fault (Input/Output Voltage/Current Fault)</label>
                    </div>

                    <div class="form-check">
                        <span>21.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Charging/Static Switch</label>
                    </div>

                    <div class="form-check">
                        <span>22.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Battery Faulty</label>
                    </div>

                    <div class="form-check">
                        <span>23.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Number of Tribu : 08</label>
                    </div>

                    <div class="form-check">
                        <span>24.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Number of Char : 01</label>
                    </div>

                    <div class="form-check">
                        <span>25.</span>
                        <input type="checkbox" id="" name="" class="form-check-input">
                        <label for="" class="form-check-label">Number of Port : 09</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" id="logo">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
        </div>


        <div id="notices">
            <div>Note:</div>
            <div class="notice">Continue : Indikasi eror terjadi permanent / terus menerus.</div>
            <div class="notice">Intermitent : Indikasi eror terjadi kadang-kadang sangat random</div>
            <div class="notice">Dead on Arrival : Perangkat mati total/rusak pada jangka waktu 24 jam setelah pemasangan</div>
            <div class="notice">Dead on Operational : Perangkat mati total/rusak pada saat beroperasi normal</div>
            <div class="notice">BER Indication : Indikasi error pada display modul/NMS/hasil bertest (disertakan no trip yang error)</div>
            <div class="notice">Software Error : Gangguan yang disebabkan firmware/IOS/internet EPROM</div>
            <div class="notice">Tributary Error : Low order modul error (PDH/SDH)</div>
            <div class="notice">Channel Error : 64K Channelize "<"2Mb Fault (for VFEM, V.24, Voice Ch)</div>
            <div class="notice">Port Error : Port membangkitkan error/mati total (IP network family, converter)</div>
            <div class="notice">Tx Laser Faulty : Only Optical Modul TX Loss, No Signal</div>
            <div class="notice">Rx Laser Faulty : Only Optical Modul No.Rx. Frame error</div>
            <div class="notice">Pyshical Damage : Rusak physic perangkat, benturan, short circuit, liquid</div>
            <div class="notice">Miscellaneous : Sebab lain yang tidak tertulis di atas</div>
        </div>
    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>