<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOGIN - TEST PROJECT SAGARA</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/custome.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="card border-0 rounded-lg mt-5 bg-transparent">
                                    <div class="card-header">
                                        <span class="text-white h1 p-5">Welcome back !</span>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('login') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" />
                                                <label for="inputEmail">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-3">
                                                <button type="submit" name="submit" class="btn-temp col-lg-12"><span> LOGIN </span></button>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                    <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                                </div>
                                                <a class="small text-temp" href="password.html">Forgot Password ?</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3"></div>
                                </div>
                                <div class="row mt-5">
                                    <div class="container-fluid px-4">
                                        <div class="text-center small">
                                            <div class="text-light">Copyright &copy; TEST PROJECT SAGARA - Fajar Hary Sanjaya 2024</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
    </body>
</html>
