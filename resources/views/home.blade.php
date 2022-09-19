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
                                <h1 class="h4 text-gray-900 mb-4" id="login-text">Login Sebagai</h1>
                            </div>
                            <div class="centertext">
                                <div class="p-5">
                                    <div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                        Umum
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary2">
                                            Mahasiswa
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                    <h4 class="modal-title">Login Umum</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="login-form" method="POST" action="{{ route('loginUmum') }}">
                            @csrf
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="username" name="username" class="form-control" id="exampleInputusername1" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            </div>
                            <!-- /.card-body -->

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-primary2" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                    <h4 class="modal-title">Login Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="username" class="form-control" name="username" id="exampleInputusername1" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            </div>
                            <!-- /.card-body -->

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button id="login" type="submit" class="btn btn-primary">
                        login
                    </button>
                </form>
                    </div>


                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </div>
        @include('partials/_footer')
</body>

</html>

