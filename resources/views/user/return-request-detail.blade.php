<?php
date_default_timezone_set('asia/jakarta');
var_dump($errors);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Detail Pengembalian | RMA Inventory</title>

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
                        <a class="nav-link" href="{{ url('/return-requests') }}">
                            <div class="nav-link-icon"><i data-feather="corner-down-left"></i></div>
                            Pengembalian
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
                            <h1 class="mb-0">Detail Pengembalian</h1>
                            <div class="small">
                                <span class="fw-500 text-primary">{{ date('l') }}</span>
                                &middot; {{ date('F d, Y') }}
                            </div>
                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-header">Detail Pengembalian</div>

                        <div class="card-body">
                            {!! session('addReturnRequestMessage') !!}

                            <form method="post" action="/return-requests/_create" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="identifier-input">No.IO/SP2K/SO/PO/ANDOP</label>
                                            <input class="form-control" id="identifier-input" type="text" name="identifier" value="{{ $returnRequest->identifier }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="created-input">Tanggal Pengembalian</label>
                                            <input class="form-control" id="created-input" type="text" value="{{ $returnRequest->created_at }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="valuation-type-input">Valuation Type</label>
                                            <select class="form-control" id="valuation-type-input" name="valuation_type" disabled>
                                                <option @if ($returnRequest->valuation_type == 'ex-Project') selected @endif>ex-Project</option>
                                                <option @if ($returnRequest->valuation_type == 'Dismantle') selected @endif>Dismantle</option>
                                                <option @if ($returnRequest->valuation_type == 'Rusak-L') selected @endif>Rusak-L</option>
                                                <option @if ($returnRequest->valuation_type == 'Rusak-TL') selected @endif>Rusak-TL</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="password-confirmation-input">Lokasi Asal</label>
                                            <input class="form-control" id="password-confirmation-input" type="text" name="origin" value="{{ $returnRequest->origin }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="customer-name-input">Customer Name</label>
                                            <input class="form-control" id="customer-name-input" type="text" name="customer_name" value="{{ $returnRequest->customer_name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="type-input">Type</label>
                                            <input class="form-control" id="type-input" type="text" name="type" value="{{ $returnRequest->type }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="brand-input">Merk</label>
                                            <input class="form-control" id="brand-input" type="text" name="brand" value="{{ $returnRequest->brand }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="serial-number-input">Serial Number (SN) / Batch</label>
                                            <input class="form-control" id="serial-number-input" type="text" name="serial_number" value="{{ $returnRequest->serial_number }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">Foto Material 1</div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                @if ($returnRequest && $returnRequest->material_picture_1)
                                                    <a href="#" data-toggle="modal" data-target="#imageModal1">
                                                        <img class="card-img-top mx-auto"
                                                            src="{{ asset('storage/' . $returnRequest->material_picture_1) }}"
                                                            style="max-width: 50%; padding: 50px;">
                                                    </a>
                                                @else
                                                    <p>No picture available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class="col-12 col-lg-6">
                                        <div class="card">
                                            <div class="card-header">Foto Material 2</div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                @if ($returnRequest && $returnRequest->material_picture_2)
                                                    <a href="#" data-toggle="modal" data-target="#imageModal2">
                                                        <img class="card-img-top mx-auto"
                                                            src="{{ asset('storage/' . $returnRequest->material_picture_2) }}"
                                                            style="max-width: 50%; padding: 50px;">
                                                    </a>
                                                @else
                                                    <p>No picture available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if ($returnRequest->request_status == 'rejected')
                                    <div class="col-12 col-lg-6">
                                        <div class="mb-3">
                                            <label for="serial-number-input">Alasan Penolakan</label>
                                            <input class="form-control" id="serial-number-input" type="text" value="{{ $returnRequest->rejection_reason }}" disabled>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="alert alert-info mb-3" role="alert">
                                    Berikan tanda centang pada checkbox jika <span class="text-warning">Material rusak</span>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 col-lg-6">
                                        <div class="col-12 mb-3">
                                            <label for="continue"><b>Continue</b></label>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="continue" name="continue_checkbox" type="checkbox" @if ($returnRequest->continue_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="continue">Indikasi error terjadi terus menerus</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="dead-on-arrival"><b>Dead On Arrival</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="dead-on-arrival" name="dead_on_arrival_checkbox" type="checkbox" @if ($returnRequest->dead_on_arrival_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="dead-on-arrival">Perangkat mati total pada jangka waktu 24 jam setelah pemasangan</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="dead-on-operational"><b>Dead On Operational</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="dead-on-operational" name="dead_on_operational_checkbox" type="checkbox" @if ($returnRequest->dead_on_operational_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="dead-on-operational">Perangkat mati total saat beroperasi normal</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="ber-indicator"><b>BER Indicator</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="ber-indicator" name="ber_indicator_checkbox" type="checkbox" @if ($returnRequest->ber_indicator_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="ber-indicator">Indikasi error pada display modul/NMS/hasil bertest (disertakan no trip yang error)</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="software-error"><b>Software Error</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="software-error" name="software_error_checkbox" type="checkbox" @if ($returnRequest->software_error_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="software-error">Gangguan yang disebabkan firmware/IOS/internet EPROM</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="tributary-error"><b>Tributary Error</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="tributary-error" name="tributary_error_checkbox" type="checkbox" @if ($returnRequest->tributary_error_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="tributary-error">Low order modul error (PDH/SDH)</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="channel-error"><b>Channel Error</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="channel-error" name="channel_error_checkbox" type="checkbox" @if ($returnRequest->channel_error_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="channel-error">64K Channelize "<"2Mb Fault (for VFEM, V.24, Voice Ch)</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="port-error"><b>Port Error</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="port-error" name="port_error_checkbox" type="checkbox" @if ($returnRequest->port_error_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="port-error">Port membangkitkan error/mati total (IP network family, converter)</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="laser-tx-faulty"><b>Laser TX Faulty</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="laser-tx-faulty" name="laser_tx_faulty_checkbox" type="checkbox" @if ($returnRequest->laser_tx_faulty_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="laser-tx-faulty">Only Optical Modul TX Loss, No Signal, High Temp, Laser Bias</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="laser-tx-faulty"><b>Laser RX Faulty</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="laser-rx-faulty" name="laser_rx_faulty_checkbox" type="checkbox" @if ($returnRequest->laser_rx_faulty_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="laser-rx-faulty">Only Optical Modul No.Rx. Frame error</label>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label for="physical-damage"><b>Physical Damage</b></label>

                                            <div class="form-check">
                                                <input class="form-check-input" id="physical-damage" name="physical_damage_checkbox" type="checkbox" @if ($returnRequest->physical_damage_checkbox == 1) checked @endif disabled>
                                                <label class="form-check-label" for="physical-damage">Rusak physic perangkat, benturan, short circuit, liquid</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row mb-3">
                                            <div class="col-12 mb-3">
                                                <label for="intermitent"><b>Intermitent</b></label>

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" id="intermitent" name="intermitent_checkbox" type="checkbox" @if ($returnRequest->intermitent_checkbox == 1) checked @endif disabled>
                                                    <label class="form-check-label" for="intermitent">Indikasi error terjadi kadang-kadang / random</label>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="rectifier-fault"><b>Rectifier/Inverter fault (Input/Output Voltage/Current Fault)</b></label>

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" id="rectifier-fault" name="rectifier_fault_checkbox" type="checkbox" @if ($returnRequest->rectifier_fault_checkbox == 1) checked @endif disabled>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="charging-switch"><b>Charging/Static Switch</b></label>

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" id="charging-switch" name="charging_switch_checkbox" type="checkbox" @if ($returnRequest->charging_switch_checkbox == 1) checked @endif disabled>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="battery-fault"><b>Battery Faulty</b></label>

                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" id="battery-fault" name="battery_faulty_checkbox" type="checkbox" @if ($returnRequest->battery_faulty_checkbox == 1) checked @endif disabled>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="number-of-tribu"><b>Number of Tribu</b></label>
                                                <input class="form-control" id="number-of-tribu" type="number" name="number_of_tribu" value="{{ $returnRequest->number_of_tribu }}" disabled>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="number-of-char"><b>Number of Char</b></label>
                                                <input class="form-control" id="number-of-char" type="number" name="number_of_char" value="{{ $returnRequest->number_of_char }}" disabled>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="number-of-port"><b>Number of Port</b></label>
                                                <input class="form-control" id="number-of-port" type="number" name="number_of_port" value="{{ $returnRequest->number_of_port }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="misscellaneous-input">Misscellaneous</label>
                                        <textarea class="form-control" id="misscellaneous-input" name="misscellaneous" rows="3" disabled>{{ $returnRequest->misscellaneous }}</textarea>
                                    </div>

                                    <div class="col-1">
                                        <table>
                                            <th>
                                                <tr>
                                                    <img class="w-100" src="{{ asset('storage/' . $creator->signature) }}">
                                                </tr>
                                            </th>
                                            <tbody>
                                                <tr>
                                                    <th>{{ $creator->username }}</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="imageModal1" tabindex="-1" role="dialog" aria-labelledby="imageModal1Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModal1Label">Foto Material 1</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $returnRequest->material_picture_1) }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="modal fade" id="imageModal2" tabindex="-1" role="dialog" aria-labelledby="imageModal2Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModal2Label">Foto Material 2</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <img src="{{ asset('storage/' . $returnRequest->material_picture_2) }}" class="img-fluid">
                        </div>
                    </div>
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