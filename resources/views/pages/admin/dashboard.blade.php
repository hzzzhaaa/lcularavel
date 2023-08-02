<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages/admin/layouts/header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <h4 class="modal-title">Selamat Datang {{$data['nama']}}</h4>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('pages/admin/layouts/footer')

</body>
</html>
