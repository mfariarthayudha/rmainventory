<?php
	date_default_timezone_set('asia/jakarta');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Pengguna | RMA Inventory</title>

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

							<!-- Sidenav Link -->
                            <a class="nav-link active" href="{{ url('/users') }}">
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
                                <h1 class="mb-0">Pengguna</h1>
                                <div class="small">
                                    <span class="fw-500 text-primary">{{ date('l') }}</span>
                                    &middot; {{ date('F d, Y') }}
                                </div>
                            </div>
                        </div>

						<div class="card mb-5">
							<div class="card-header">Tambahkan Pengguna</div>

							<div class="card-body">
                                {!! session('addUserMessage') !!}

								<form method="post" action="/users/_add-user">
                                    @csrf

									<div class="mb-3">
										<label for="username-input">Nama Pengguna</label>
										<input class="form-control" id="username-input" type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan Nama Pengguna">
                                        <small class="text-danger">{{ $errors->first('username') }}</small>
                                    </div>

									<div class="row">
										<div class="col-12 col-lg-6">
											<div class="mb-3">
												<label for="password-input">Kata Sandi</label>
												<input class="form-control" id="password-input" type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Kata Sandi">
                                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                            </div>
										</div>

										<div class="col-12 col-lg-6">
											<div class="mb-3">
												<label for="password-confirmation-input">Konfirmasi Kata Sandi</label>
												<input class="form-control" id="password-confirmation-input" type="password" name="passwordConfirmation" value="{{ old('passwordConfirmation') }}" placeholder="Masukkan ulang Kata Sandi">
                                                <small class="text-danger">{{ $errors->first('passwordConfirmation') }}</small>
                                            </div>
										</div>
									</div>

									<div class="text-end">
										<button type="submit" class="btn btn-primary">Tambah</button>
									</div>
								</form>
							</div>
						</div>

						<div class="card">
							<div class="card-header">Daftar Pengguna</div>

							<div class="card-body">
                                {!! session('deleteUserMessage') !!}

								<table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
											<th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                <a href="{{ url('/users/_delete-user?userId=' . $user->user_id) }}" class="btn btn-danger"><i data-feather="trash-2"></i></a>
                                            </td>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/litepicker.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="/sb-admin-pro/js/datatables/datatables-simple-demo.js"></script>
    </body>
</html>
