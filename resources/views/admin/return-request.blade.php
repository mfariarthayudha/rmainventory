<?php
	date_default_timezone_set('asia/jakarta');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Pengembalian | RMA Inventory</title>

        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="/sb-admin-pro/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="/sb-admin-pro/assets/img/favicon.png" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <!-- Sidenav Toggle Button-->
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Brand-->
            <!-- * * Tip * * You can use text or an image for your navbar brand.-->
            <!-- * * * * * * When using an image, we recommend the SVG format.-->
            <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
            <img src="/images/pln-logo.png" class="navbar-brand pe-3 ps-4 ps-lg-2">
            
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- User Dropdown-->
                <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img class="img-fluid" src="/sb-admin-pro/assets/img/illustrations/profiles/profile-1.png" />
					</a>

                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="/sb-admin-pro/assets/img/illustrations/profiles/profile-1.png" />
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">{{ $user->username }}</div>
                                <div class="dropdown-user-details-email">{{ $user->role }}</div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/authentication/_logout') }}">
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <!-- Sidenav Menu Heading (Core)-->
                            <div class="sidenav-menu-heading">Menu</div>

                            <!-- Sidenav Link -->
                            <a class="nav-link" href="{{ url('/') }}">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dasbor
                            </a>

                            <!-- Sidenav Link -->
                            <a class="nav-link active" href="{{ url('/return-requests') }}">
                                <div class="nav-link-icon"><i data-feather="corner-down-left"></i></div>
                                Pengembalian
                            </a>

                            <!-- Sidenav Link -->
                            <a class="nav-link" href="{{ url('/users') }}">
                                <div class="nav-link-icon"><i data-feather="users"></i></div>
                                Pengguna
                            </a>
                        </div>
                    </div>
                    <!-- Sidenav Footer-->
                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Masuk sebagai :</div>
                            <div class="sidenav-footer-title">{{ $user->username }}</div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-5">
                        <!-- Custom page header alternative example-->
                        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                            <div class="me-4 mb-3 mb-sm-0">
                                <h1 class="mb-0">Pengembalian</h1>
                                <div class="small">
                                    <span class="fw-500 text-primary">{{ date('l') }}</span>
                                    &middot; {{ date('F d, Y') }}
                                </div>
                            </div>
                        </div>

						<div class="card">
							<div class="card-header">Daftar Pengembalian</div>

							<div class="card-body">
                                {!! session('approveReturnRequestMessage') !!}
                                {!! session('rejectReturnRequestMessage') !!}

                                <div class="row mb-3">
                                    <div class="col-12 col-lg-3">
                                        <form method="get" action="/return-requests">
                                            <div class="mb-3">
                                                <select class="form-control" name="status">
                                                    <option @if ($status == 'all') selected @endif>all</option>
                                                    <option @if ($status == 'pending') selected @endif>pending</option>
                                                    <option @if ($status == 'approved') selected @endif>approved</option>
                                                    <option @if ($status == 'rejected') selected @endif>rejected</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <div id="export-excel-button" class="text-end mb-3">
                                </div>

								<table id="datatablesSimple">
                                    <thead>
										<tr>
											<th>No</th>
                                            <th>No.IO/SP2k/SO/PO/ANDOP</th>
                                            <th>SN</th>
											<th>Customer</th>
											<th>Status</th>
											<th>Tanggal Pengembalian</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>No</th>
                                            <th>No.IO/SP2k/SO/PO/ANDOP</th>
                                            <th>SN</th>
											<th>Customer</th>
											<th>Status</th>
											<th>Tanggal Pengembalian</th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($returnRequests as $index => $returnRequest)
                                        <tr>
                                            <th>{{ $index + 1 }}</th>
                                            <th>{{ $returnRequest->identifier }}</th>
                                            <th>{{ $returnRequest->serial_number }}</th>
                                            <th>{{ $returnRequest->customer_name }}</th>
                                            <th>{{ $returnRequest->request_status }}</th>
                                            <th>{{ $returnRequest->created_at }}</th>
                                            <th>
                                                <a href="/return-requests/detail?returnRequestId={{ $returnRequest->return_request_id }}" class="btn btn-primary">Detail</a>
                                                <!-- <a href="{{ route('return-requests.export-pdf') }}" class="btn btn-warning">Export PDF</a> -->
                                                <a href="{{ url('/return-requests/_export-pdf?returnRequestId=' . $returnRequest->return_request_id) }}" class="btn btn-warning">Export PDF</a>

                                            </th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
							</div>
						</div>
                    </div>
                </main>
            </div>
        </div>

        <table id="data-table-export" class="d-none">
            <thead>
                <tr>
                    <th>No.IO/SP2k/SO/PO/ANDOP</th>
                    <th>Valuation Type</th>
                    <th>Lokasi Asal</th>
                    <th>Customer Name</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Serial Number (SN) / Batch</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No.IO/SP2k/SO/PO/ANDOP</th>
                    <th>Valuation Type</th>
                    <th>Lokasi Asal</th>
                    <th>Customer Name</th>
                    <th>Merk</th>
                    <th>Type</th>
                    <th>Serial Number (SN) / Batch</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($returnRequests as $returnRequest)
                <tr>
                    <th>{{ $returnRequest->identifier }}</th>
                    <th>{{ $returnRequest->valuation_type }}</th>
                    <th>{{ $returnRequest->origin }}</th>
                    <th>{{ $returnRequest->customer_name }}</th>
                    <th>{{ $returnRequest->brand }}</th>
                    <th>{{ $returnRequest->type }}</th>
                    <th>{{ $returnRequest->serial_number }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/litepicker.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/datatables/datatables-simple-demo.js"></script>

        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    
        <script>
            var dataTable = $('#data-table-export').DataTable({
                paging: false,
                searching: false,
            });

            // Populate DataTable with data (replace this with your data)

            // Add Excel export button
            new $.fn.dataTable.Buttons(dataTable, {
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export to Excel',
                        className: 'btn-excel',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        }
                    }
                ]
            });

            // Display the Excel export button
            dataTable.buttons('.btn-excel').container().appendTo($('#export-excel-button'));
        </script>
    </body>
</html>
