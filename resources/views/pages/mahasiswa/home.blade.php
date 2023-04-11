<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages/mahasiswa/layouts/_header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo lcu.png" alt="AdminLTELogo" height="100" width="150">
  </div>
  @include('pages/mahasiswa/layouts/navbar')
  @include('pages/mahasiswa/layouts/sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                @if ($data->nim==NULL)
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                      <h3 class="widget-user-username">{{$data->nama}}</h3>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="../img/avatar.png" alt="">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                          <ul class="col-md-12">
                              <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right">{{$data->alamat}}</a>
                              </li>
                              <li class="list-group-item">
                                <b>Tempat Tanggal lahir</b> <a class="float-right">{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</a>
                              </li>
                              <li class="list-group-item">
                                <b>Nomer Telepon</b> <a class="float-right">{{$data->no_telp}}</a>
                              </li>
                              <li class="list-group-item">
                                @if ($ktp==null)
                                <a class="float-right"><form enctype="multipart/form-data" method="post" action="{{route("uploadktp")}}">
                                    @csrf
                                    <td><input type="file" class="form-control-file" id="ktp" name="ktp">

                                        <button class="btn btn-primary" id="login-button" type="submit">Upload</button>
                                    </td>
                                </form>
                                </a>
                                @else
                                <b>Kartu Tanda Penduduk</b>
                                <a class="float-right">
                                    <img class="img" src="{{$ktp->img_info}}" alt="" height="100" width="150">
                                </a>
                                @endif

                              </li>
                          </ul>
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                @else
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                      <h3 class="widget-user-username">{{$data->nama}}</h3>
                      <h5 class="widget-user-desc">Mahasiswa Universitas Negeri Jakarta</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="../img/avatar.png" alt="">
                    </div>
                    <div class="card-footer">
                      <div class="row">
                          <ul class="col-md-12">
                              <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right">{{$data->alamat}}</a>
                              </li>
                              <li class="list-group-item">
                                <b>Tempat Tanggal lahir</b> <a class="float-right">{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</a>
                              </li>
                              <li class="list-group-item">
                                <b>Nomer Telepon</b> <a class="float-right">{{$data->no_telp}}</a>
                              </li>
                          </ul>
                      </div>
                      <!-- /.row -->
                    </div>
                  </div>
                @endif

                <!-- /.widget-user -->
              </div>
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
