<?php
	date_default_timezone_set('asia/jakarta');
    $chartData = [$totalReturnRequest, $pendingReturnRequest, $approvedReturnRequest, $rejectedReturnRequest];
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
                    <div id="notification" class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="me-2" data-feather="bell"></i>
                            Pemberitahuan
                        </h6>
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
                            <a class="nav-link" href="{{ url('/return-requests') }}">
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
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-4">
                                <!-- Dashboard info widget 1-->
                                <div class="card border-start-lg border-start-primary h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <div class="small fw-bold text-primary mb-1">Pengembalian</div>
                                                <div class="h5">{{ $totalReturnRequest }}</div>
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
                                                <div class="h5">{{ $pendingReturnRequest }}</div>
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
                                                <div class="h5">{{ $approvedReturnRequest }}</div>
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
                                                <div class="h5">{{ $rejectedReturnRequest }}</div>
                                            </div>
                                            <div class="ms-2"><i class="fa-solid fa-xmark fa-2x text-gray-200"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Chart pengembalian</div>

                            <div class="card-body">
                                <div class="chart-bar"><canvas id="return-request-chart" width="100%" height="50"></canvas></div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <div id="chart-data" data-chart-data="@json($chartData)"></div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/litepicker.js"></script>

        <script src="/jquery/jquery.min.js"></script>
        <script src="/axios/axios.min.js"></script>

        <script>
            let chartData = JSON.parse(document.querySelector('#chart-data').dataset.chartData)
            var ctx = document.getElementById("return-request-chart");
            var myBarChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Pengembalian", "Menunggu", "Disetujui", "Ditolak"],
                    datasets: [{
                        label: "Total",
                        backgroundColor: "rgba(0, 97, 242, 1)",
                        hoverBackgroundColor: "rgba(0, 97, 242, 0.9)",
                        borderColor: "#4e73df",
                        data: chartData,
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: "month"
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            }
                        }],
                        yAxes: [{
                            
                            gridLines: {
                                color: "rgb(234, 236, 244)",
                                zeroLineColor: "rgb(234, 236, 244)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    
                }
            });

            setInterval(() => {
                axios('https://rmainventory.com/api/unnotified-request')
                .then(response => {
                    response.data.forEach(notification => {
                        $('#notification').append(`
                            <a class="dropdown-item dropdown-notifications-item" href="javascript:void(0)">
                                <div class="dropdown-notifications-item-content">
                                    <div class="dropdown-notifications-item-content-text">${notification.customer_name} mengirimkan pengembalian baru</div>
                                </div>
                            </a>
                        `)
                    })
                })
            }, 3000);
        </script>
    </body>
</html>
