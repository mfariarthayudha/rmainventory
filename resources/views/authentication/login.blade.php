<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Masuk | RMA Inventory</title>

    <link href="/sb-admin-pro/css/styles.css" rel="stylesheet" />
    <link href="/sb-admin-pro/css/sb-admin-2.css" rel="stylesheet" />

    <link rel="icon" type="image/x-icon" href="/sb-admin-pro/assets/img/favicon.png" />

    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-primary1">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <div class="d-flex align-items-center justify-content-center mt-2">
                            <img src="{{ asset('images/header.png') }}" alt="PLN Logo" height="150px">
                            </div>

                            <div class="card o-hidden border-0 shadow-lg ">
                                <div class="card-body p-0  align-items-center">
                                    <!-- Nested Row within Card Body -->

                                    <div class="row ">
                                        <div class="col-lg-6 d-flex align-items-center justify-content-center p-2">
                                            <img src="{{ asset('images/logo.png') }}" alt="PLN Logo" height="70%">
                                        </div>
                                        <div class="col-lg-6 d-flex align-items-center justify-content-center ">
                                            <div class="p-2">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4"><b>LOGIN</b></h1>
                                                </div>
                                                <form class="user" method="post" action="/authentication/_login">
                                                    @if ($errors->first('loginError'))
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        {{ $errors->first('loginError') }}
                                                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    @endif
                                                    @csrf

                                                    <div class="form-group">
                                                        <input id="inputEmailAddress" type="text" name="username" value="{{ old('username') }}" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukkan Nama Pengguna">
                                                        <small class="text-danger">{{ $errors->first('username') }}</small>

                                                    </div>
                                                    <div class="form-group">
                                                        <input id="inputPassword" type="password" name="password" value="{{ old('password') }}" class="form-control form-control-user" placeholder="Password">
                                                        <small class="text-danger">{{ $errors->first('password') }}</small>

                                                    </div>
                                                    <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                                    <button type="submit" href="dashboard-1.html" class="btn btn-primary btn-user btn-block">
                                                        Masuk
                                                    </button>

                                                </form>

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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>