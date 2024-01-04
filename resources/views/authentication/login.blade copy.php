<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Masuk | RMA Inventory</title>

    <link href="/sb-admin-pro/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/sb-admin-pro/assets/img/favicon.png" />

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                        <div class="text-center mt-4 mb-4">
                                    <img src="{{ asset('images/logo.png') }}" alt="PLN Logo"  height="200">
                                    </div>
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light">Masuk</h3>
                                </div>
                                <div class="card-body">
                                    
                                    @if ($errors->first('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $errors->first('loginError') }}
                                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @endif

                                    <!-- Login form-->
                                    <form method="post" action="/authentication/_login">
                                        @csrf

                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Nama Pengguna</label>
                                            <input class="form-control" id="inputEmailAddress" type="text" name="username" value="{{ old('username') }}" placeholder="Masukkan Nama Pengguna" />
                                            <small class="text-danger">{{ $errors->first('username') }}</small>
                                        </div>

                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                            <input class="form-control" id="inputPassword" type="password" name="password" value="{{ old('password') }}" placeholder="Masukkan Kata Sandi" />
                                            <small class="text-danger">{{ $errors->first('password') }}</small>
                                        </div>

                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" href="dashboard-1.html">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Hak cipta &copy; rmainventory.com</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/sb-admin-pro/js/scripts.js"></script>
</body>

</html>