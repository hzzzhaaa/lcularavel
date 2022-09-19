<!DOCTYPE html>
<html>
    <head>
        @include('partials/_header')

    </head>
    <body class="hold-transition layout-top-nav">
        @include('sweetalert::alert')
    <div class="wrapper">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <img src="../img/logo lcu.png" class="center">
                            <div class="centertext">
                                <div class="p-5">
                                    <h1 class="h4 text-gray-900 mb-4" id="login-text">Register</h1>
                                    <form method="POST" action="{{ route('_register') }}">
                                        @csrf
                                        <div class="card-body">
                                          <div class="form-group row">
                                              <label for="exampleInputEmail1">Nama Lengkap</label>
                                              <input type="nama" name="nama" class="form-control form-control-user" id="exampleInputEmail1" required>
                                          </div>
                                          <div class="form-group row">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="username" name="username" class="form-control form-control-user" id="exampleInputEmail2" required>
                                        </div>
                                          <div class="form-group row">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail1" required>
                                          </div>
                                            <div class="form-group row">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group row">
                                                <label for="password">Confirm Password</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">

                                            </div>
                                        </div>
                                        <button id="register" type="submit" class="btn btn-primary">
                                            Register
                                        </button>
                                    </form>
                                        <!-- /.card-body -->
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

