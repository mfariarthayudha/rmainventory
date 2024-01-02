<?php
	date_default_timezone_set('asia/jakarta');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Dasbor | RMA Inventory</title>

        <link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />
        <link href="/sb-admin-pro/css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="/sb-admin-pro/assets/img/favicon.png" />

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
                <!-- Alerts Dropdown-->
                <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="bell"></i>
                            Alerts Center
                        </h6>
                        <!-- Example Alert 1-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2021</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
                        <!-- Example Alert 2-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 22, 2021</div>
                                <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
                            </div>
                        </a>
                        <!-- Example Alert 3-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 8, 2021</div>
                                <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
                            </div>
                        </a>
                        <!-- Example Alert 4-->
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 2, 2021</div>
                                <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                    </div>
                </li>
                
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
                            <a class="nav-link active" href="{{ url('/') }}">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dasbor
                            </a>

                            <!-- Sidenav Link -->
                            <a class="nav-link" href="{{ url('/return') }}">
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
                                <h1 class="mb-0">Dasbor</h1>
                                <div class="small">
                                    <span class="fw-500 text-primary">{{ date('l') }}</span>
                                    &middot; {{ date('F d, Y') }}
                                </div>
                            </div>
                            <!-- Date range picker example-->
                            <div class="input-group input-group-joined border-0 shadow" style="width: 16.5rem">
                                <span class="input-group-text"><i data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                            </div>
                        </div>
                        <!-- Illustration dashboard card example-->
                        <div class="card card-waves mb-4 mt-5">
                            <div class="card-body p-5">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <h2 class="text-primary">Selamat datang {{ $user->username }}, Dasbor anda sudah siap!</h2>
                                        <p class="text-gray-700">Great job, your affiliate dashboard is ready to go! You can view sales, generate links, prepare coupons, and download affiliate reports using this dashboard.</p>
                                    </div>

                                    <div class="col d-none d-lg-block mt-xxl-n4"><img class="img-fluid px-xl-4 mt-xxl-n5" src="/sb-admin-pro/assets/img/illustrations/statistics.svg" /></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <!-- Dashboard info widget 1-->
                                <div class="card border-start-lg border-start-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-primary mb-1">Pengembalian</div>
                                                <div class="h5">$4,390</div>
                                                <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                                    <i class="me-1" data-feather="trending-up"></i>
                                                    12%
                                                </div>
                                            </div>
                                            <div class="ms-2"><i class="fa-solid fa-rotate-left fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <!-- Dashboard info widget 2-->
                                <div class="card border-start-lg border-start-warning h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-warning mb-1">Menunggu</div>
                                                <div class="h5">$27.00</div>
                                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                                    <i class="me-1" data-feather="trending-down"></i>
                                                    3%
                                                </div>
                                            </div>
                                            <div class="ms-2"><i class="fa-solid fa-hourglass-half fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <!-- Dashboard info widget 3-->
                                <div class="card border-start-lg border-start-success h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-success mb-1">Disetujui</div>
                                                <div class="h5">11,291</div>
                                                <div class="text-xs fw-bold text-success d-inline-flex align-items-center">
                                                    <i class="me-1" data-feather="trending-up"></i>
                                                    12%
                                                </div>
                                            </div>
                                            <div class="ms-2"><i class="fa-solid fa-check fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <!-- Dashboard info widget 4-->
                                <div class="card border-start-lg border-start-danger h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-danger mb-1">Ditolak</div>
                                                <div class="h5">1.23%</div>
                                                <div class="text-xs fw-bold text-danger d-inline-flex align-items-center">
                                                    <i class="me-1" data-feather="trending-down"></i>
                                                    1%
                                                </div>
                                            </div>
                                            <div class="ms-2"><i class="fa-solid fa-xmark fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <!-- Illustration card example-->
                                <div class="card mb-4">
                                    <div class="card-body text-center p-5">
                                        <img class="img-fluid mb-5" src="assets/img/illustrations/data-report.svg" />
                                        <h4>Report generation</h4>
                                        <p class="mb-4">Ready to get started? Let us know now! It's time to start building that dashboard you've been waiting to create!</p>
                                        <a class="btn btn-primary p-3" href="#!">Continue</a>
                                    </div>
                                </div>
                                <!-- Report summary card example-->
                                <div class="card mb-4">
                                    <div class="card-header">Affiliate Reports</div>
                                    <div class="list-group list-group-flush small">
                                        <a class="list-group-item list-group-item-action" href="#!">
                                            <i class="fas fa-dollar-sign fa-fw text-blue me-2"></i>
                                            Earnings Reports
                                        </a>
                                        <a class="list-group-item list-group-item-action" href="#!">
                                            <i class="fas fa-tag fa-fw text-purple me-2"></i>
                                            Average Sale Price
                                        </a>
                                        <a class="list-group-item list-group-item-action" href="#!">
                                            <i class="fas fa-mouse-pointer fa-fw text-green me-2"></i>
                                            Engagement (Clicks &amp; Impressions)
                                        </a>
                                        <a class="list-group-item list-group-item-action" href="#!">
                                            <i class="fas fa-percentage fa-fw text-yellow me-2"></i>
                                            Conversion Rate
                                        </a>
                                        <a class="list-group-item list-group-item-action" href="#!">
                                            <i class="fas fa-chart-pie fa-fw text-pink me-2"></i>
                                            Segments
                                        </a>
                                    </div>
                                    <div class="card-footer position-relative border-top-0">
                                        <a class="stretched-link" href="#!">
                                            <div class="text-xs d-flex align-items-center justify-content-between">
                                                View More Reports
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!-- Progress card example-->
                                <div class="card bg-primary border-0">
                                    <div class="card-body">
                                        <h5 class="text-white-50">Budget Overview</h5>
                                        <div class="mb-4">
                                            <span class="display-4 text-white">$48k</span>
                                            <span class="text-white-50">per year</span>
                                        </div>
                                        <div class="progress bg-white-25 rounded-pill" style="height: 0.5rem"><div class="progress-bar bg-white w-75 rounded-pill" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 mb-4">
                                <!-- Area chart example-->
                                <div class="card mb-4">
                                    <div class="card-header">Revenue Summary</div>
                                    <div class="card-body">
                                        <div class="chart-area"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- Bar chart example-->
                                        <div class="card h-100">
                                            <div class="card-header">Sales Reporting</div>
                                            <div class="card-body d-flex flex-column justify-content-center">
                                                <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                                            </div>
                                            <div class="card-footer position-relative">
                                                <a class="stretched-link" href="#!">
                                                    <div class="text-xs d-flex align-items-center justify-content-between">
                                                        View More Reports
                                                        <i class="fas fa-long-arrow-alt-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Pie chart example-->
                                        <div class="card h-100">
                                            <div class="card-header">Traffic Sources</div>
                                            <div class="card-body">
                                                <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                                <div class="list-group list-group-flush">
                                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                        <div class="me-3">
                                                            <i class="fas fa-circle fa-sm me-1 text-blue"></i>
                                                            Direct
                                                        </div>
                                                        <div class="fw-500 text-dark">55%</div>
                                                    </div>
                                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                        <div class="me-3">
                                                            <i class="fas fa-circle fa-sm me-1 text-purple"></i>
                                                            Social
                                                        </div>
                                                        <div class="fw-500 text-dark">15%</div>
                                                    </div>
                                                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                        <div class="me-3">
                                                            <i class="fas fa-circle fa-sm me-1 text-green"></i>
                                                            Referral
                                                        </div>
                                                        <div class="fw-500 text-dark">30%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/assets/demo/chart-area-demo.js"></script>
        <script src="/sb-admin-pro/assets/demo/chart-bar-demo.js"></script>
        <script src="/sb-admin-pro/assets/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/litepicker.js"></script>
    </body>
</html>
