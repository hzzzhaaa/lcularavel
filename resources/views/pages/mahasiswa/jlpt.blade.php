<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages/mahasiswa/layouts/_header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo lcu.png" alt="AdminLTELogo" height="100" width="150">
  </div>
  @include('pages/mahasiswa/layouts/navbar')
  @include('pages/mahasiswa/layouts/sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <img style="width: 65%; display:block; margin-left:450px;" src="../img/logo/logo-jlptunj.png" alt="photo" id="logo-toep">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <img style="width: 65%; display:block; margin-left:450px;" src="../img/descjelpt.png" alt="" id="logo-toep">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <img style="width: 65%; display:block; margin-left:450px;" src="../img/syaratonline_indonesia.png" alt="" id="logo-toep">
                        </div>
                    </div>
                  <!-- Add the bg color to the header using any of the bg-* classes -->

                  <div class="widget-user-image">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                        <ul class="col-md-12">
                            <li class="list-group-item">
                              <b>Toep Express</b> <a class="float-right" href="#modal-express" data-toggle="modal">Daftar</a>
                            </li>
                            <li class="list-group-item">
                              <b>Toep Reguler</b> <a class="float-right" href="#modal-reguler" data-toggle="modal">Daftar</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
              </div>
            </div>
            <div class="modal fade" id="modal-express" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h4 class="modal-title">TOEP REGULER</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('pendaftaran') }}">
                            @csrf
                            @if ($data->nim==null)
                                @if ($useridentity==null)
                                <fieldset>
                                    <div class="form-group" id="1">
                                        <p style="font-size: medium; font-weight: bold">
                                            Anda belum upload kartu identitas, klik untuk <a href="{{route('profile')}}">upload kartu identitas</a></p>
                                    </div>
                                </fieldset>
                                @elseif ($useridentity->status=="requested")
                                    <fieldset>
                                        <input type="text" name="event" value="1" hidden>
                                        <input type="text" name="name" value="2" hidden>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <select class="form-control" id="1" name="type" required>
                                                <option selected disabled>Pilih Tipe Test
                                                </option>
                                                <option>Paper Based Test
                                                </option>
                                                <option>Computer Based Test
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="1">
                                            <p style="font-size: medium; font-weight: bold">
                                                Deskripsi</p>
                                        </div>
                                        <div class="form-group" id="">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <input type="radio" name="site" id="On Site" value="On Site">
                                            <label for="On Site">Onsite</label><br>
                                            <input type="radio" name="site" id="Online" value="Online">
                                            <label for="Online">Online</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Metode Pembayaran</label>
                                            <select class="form-control" id="paymentmethod" name="paymentmethod">
                                                <option selected disabled>
                                                    Pilih Metode Pembayaran
                                                </option>
                                                    <option value="1">
                                                        BNI
                                                    </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    @elseif ($useridentity->status=="verified")
                                    <fieldset>
                                        <input type="text" name="event" value="1" hidden>
                                        <input type="text" name="name" value="2" hidden>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <select class="form-control" id="1" name="type" required>
                                                <option selected disabled>Pilih Tipe Test
                                                </option>
                                                <option>Paper Based Test
                                                </option>
                                                <option>Computer Based Test
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="1">
                                            <p style="font-size: medium; font-weight: bold">
                                                Deskripsi</p>
                                        </div>
                                        <div class="form-group" id="">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <input type="radio" name="site" id="On Site" value="On Site">
                                            <label for="On Site">Onsite</label><br>
                                            <input type="radio" name="site" id="Online" value="Online">
                                            <label for="Online">Online</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Metode Pembayaran</label>
                                            <select class="form-control" id="paymentmethod" name="paymentmethod">
                                                <option selected disabled>
                                                    Pilih Metode Pembayaran
                                                </option>
                                                    <option value="1">
                                                        BNI
                                                    </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                @endif

                            @else
                                <fieldset>
                                    <input type="text" name="event" value="1" hidden>
                                    <input type="text" name="name" value="2" hidden>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Pilih Tipe Test</label>
                                        <select class="form-control" id="1" name="type" required>
                                            <option selected disabled>Pilih Tipe Test
                                            </option>
                                            <option>Paper Based Test
                                            </option>
                                            <option>Computer Based Test
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="1">
                                        <p style="font-size: medium; font-weight: bold">
                                            Deskripsi</p>
                                    </div>
                                    <div class="form-group" id="">
                                        <label for="disabledTextInput">Pilih Tipe Test</label>
                                        <input type="radio" name="site" id="On Site" value="On Site">
                                        <label for="On Site">Onsite</label><br>
                                        <input type="radio" name="site" id="Online" value="Online">
                                        <label for="Online">Online</label><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Metode Pembayaran</label>
                                        <select class="form-control" id="paymentmethod" name="paymentmethod">
                                            <option selected disabled>
                                                Pilih Metode Pembayaran
                                            </option>
                                                <option value="1">
                                                    BNI
                                                </option>
                                        </select>
                                    </div>
                                </fieldset>
                            @endif
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" href="/profile" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-reguler" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h4 class="modal-title">TOEP REGULER</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="pendaftaran">
                            @csrf
                            @if ($data->nim==null)
                                @if ($useridentity==null)
                                <fieldset>
                                    <div class="form-group" id="1">
                                        <p style="font-size: medium; font-weight: bold">
                                            Anda belum upload kartu identitas, klik untuk <a href="{{route('profile')}}">upload kartu identitas</a></p>
                                    </div>
                                </fieldset>
                                @elseif ($useridentity->status=="requested")
                                    <fieldset>
                                        <input type="text" name="event" value="1" hidden>
                                        <input type="text" name="name" value="2" hidden>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <select class="form-control" id="1" name="type" required>
                                                <option selected disabled>Pilih Tipe Test
                                                </option>
                                                <option>Paper Based Test
                                                </option>
                                                <option>Computer Based Test
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="1">
                                            <p style="font-size: medium; font-weight: bold">
                                                Deskripsi</p>
                                        </div>
                                        <div class="form-group" id="">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <input type="radio" name="site" id="On Site" value="On Site">
                                            <label for="On Site">Onsite</label><br>
                                            <input type="radio" name="site" id="Online" value="Online">
                                            <label for="Online">Online</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Metode Pembayaran</label>
                                            <select class="form-control" id="paymentmethod" name="paymentmethod">
                                                <option selected disabled>
                                                    Pilih Metode Pembayaran
                                                </option>
                                                    <option value="1">
                                                        BNI
                                                    </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    @elseif ($useridentity->status=="verified")
                                    <fieldset>
                                        <input type="text" name="event" value="1" hidden>
                                        <input type="text" name="name" value="2" hidden>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <select class="form-control" id="1" name="type" required>
                                                <option selected disabled>Pilih Tipe Test
                                                </option>
                                                <option>Paper Based Test
                                                </option>
                                                <option>Computer Based Test
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="1">
                                            <p style="font-size: medium; font-weight: bold">
                                                Deskripsi</p>
                                        </div>
                                        <div class="form-group" id="">
                                            <label for="disabledTextInput">Pilih Tipe Test</label>
                                            <input type="radio" name="site" id="On Site" value="On Site">
                                            <label for="On Site">Onsite</label><br>
                                            <input type="radio" name="site" id="Online" value="Online">
                                            <label for="Online">Online</label><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="disabledTextInput">Metode Pembayaran</label>
                                            <select class="form-control" id="paymentmethod" name="paymentmethod">
                                                <option selected disabled>
                                                    Pilih Metode Pembayaran
                                                </option>
                                                    <option value="1">
                                                        BNI
                                                    </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                @endif

                            @else
                                <fieldset>
                                    <input type="text" name="event" value="1" hidden>
                                    <input type="text" name="name" value="2" hidden>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Pilih Tipe Test</label>
                                        <select class="form-control" id="1" name="type" required>
                                            <option selected disabled>Pilih Tipe Test
                                            </option>
                                            <option>Paper Based Test
                                            </option>
                                            <option>Computer Based Test
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="1">
                                        <p style="font-size: medium; font-weight: bold">
                                            Deskripsi</p>
                                    </div>
                                    <div class="form-group" id="">
                                        <label for="disabledTextInput">Pilih Tipe Test</label>
                                        <input type="radio" name="site" id="On Site" value="On Site">
                                        <label for="On Site">Onsite</label><br>
                                        <input type="radio" name="site" id="Online" value="Online">
                                        <label for="Online">Online</label><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="disabledTextInput">Metode Pembayaran</label>
                                        <select class="form-control" id="paymentmethod" name="paymentmethod">
                                            <option selected disabled>
                                                Pilih Metode Pembayaran
                                            </option>
                                                <option value="1">
                                                    BNI
                                                </option>
                                        </select>
                                    </div>
                                </fieldset>
                            @endif
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="button" href="/profile" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('pages/mahasiswa/layouts/_footer')
</body>
</html>
