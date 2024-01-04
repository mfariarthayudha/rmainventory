<!DOCTYPE html>
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
        margin-bottom: 30px;
    }

   

    h1 {
        border-top: 1px solid #5D6975;
        border-bottom: 1px solid #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
    }

    h2 {
        color: #5D6975;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
    }

    #project {
        float: left;
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
</style>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>RMA (Isi tarik Nama atau nomer Kali ya ri)</title>

</head>

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
        <div id="notices">
            <div>Note:</div>
            <div class="notice">Diisi Note.</div>
        </div>
    </main>

</body>

</html>