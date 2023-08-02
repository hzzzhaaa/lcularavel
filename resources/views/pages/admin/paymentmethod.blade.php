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
                  <h3 class="card-title">Payment Method</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                        Tambah Payment Method
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 40px">Nama Bank</th>
                        <th style="width: 40px">Nomor Rekening</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $payment)
                        <tr>
                            <td>{{$payment->bank_name}}</td>
                            <td>
                                {{$payment->account_number}}
                            </td>
                            <td>
                                <a href="{{route('admin.update.ktp',['id' => $payment->id])}}" class="btn btn-large btn-danger"><strong>Hapus</strong></a>

                                <a href="{{route('admin.update.ktp',['id' => $payment->id])}}" class="btn btn-large btn-info"><strong>Edit</strong></a>
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
      </div>
      <div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
            <h4 class="modal-title">Tambah Payment Method</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
                <form class="login-form" method="POST" action="{{route('admin._paymentmethod')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Bank</label>
                            <input type="nama" name="nama" class="form-control" id="exampleInputnama1" placeholder="Enter nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nomor Rekening</label>
                            <input type="norek" name="norek" class="form-control" id="exampleInputnorek1" placeholder="norek">
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
    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('pages/admin/layouts/footer')

</body>
</html>
