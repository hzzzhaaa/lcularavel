<!DOCTYPE html>
<html>
    <head>
        @include('partials/_header')
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        @include('partials/navbar')
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4" id="login-text">Login</h1>
                                            <hr class="line">
                                        </div>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input type="text" name="email" class="form-control form-control-user"
                                                    id="email" placeholder=""
                                                    value="">

                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    id="password" placeholder="">

                                            </div>
                                            <button class="btn btn-primary btn-user btn-block" id="login-button"
                                                type="submit">Login</button>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember me</label>
                                                </div>
                                            </div>
                                            <hr class="line">
                                            <div class="text-center">
                                                <a class="small" href="forgot-password.html">lupa password</a>
                                            </div>
                                            <div class="text-center">
                                                <h6>Belum punya akun?</h6>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        </div>
        @include('partials/_footer')
    </body>

</html>
