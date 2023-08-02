
<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages/admin/layouts/header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
<div class="wrapper">
  @include('pages/admin/layouts/navbar')
  @include('pages/admin/layouts/sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Kartu Identitas User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 40px">Nama</th>
                        <th style="width: 40px">Gambar KTP</th>
                        <th style="width: 40px">Status</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $ktp)
                        <tr>
                            <td>{{$ktp->user_id->nama}}</td>
                            <td>
                                <img class="img" src="../{{$ktp->img_info}}" alt="" height="100" width="150">
                            </td>
                            <td>
                              {{$ktp->status}}
                            </td>
                            <td>
                                <a href="{{route('admin.update.ktp',['id' => $ktp->id])}}" class="btn btn-large btn-info"><strong>Verifikasi</strong></a>
                            </td>
                          </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                  </ul>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('pages/admin/layouts/footer')

</body>
</html>
