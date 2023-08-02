<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages/admin/layouts/header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('sweetalert::alert')
        @include('pages/admin/layouts/navbar')
        @include('pages/admin/layouts/sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">TOEP</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <h3 style="margin-top:10px" class="card-title">List Peserta Yang Harus Di
                                            Verifikasi</h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6"></div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example2"
                                                    class="table table-bordered table-hover dataTable dtr-inline"
                                                    aria-describedby="example2_info">
                                                    <thead>
                                                        <tr>
                                                            <th class="sorting sorting_asc" tabindex="0"
                                                                aria-controls="example2" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="Rendering engine: activate to sort column descending">
                                                                Nama Peserta</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Browser: activate to sort column ascending">
                                                                Jenis Ujian</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Platform(s): activate to sort column ascending">
                                                                Payment Method</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2"
                                                                rowspan="1" colspan="1"
                                                                aria-label="Engine version: activate to sort column ascending">
                                                                Bukti Pembayaran</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example2"
                                                                rowspan="1" colspan="1"
                                                                aria-label="CSS grade: activate to sort column ascending">
                                                                Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $data)
                                                            <tr>
                                                                <td>{{ $data->user_id->name }}</td>
                                                                <td>{{ $data->event_name }} {{ $data->event_id->type }}
                                                                    {{ $data->event_id->test_based }}</td>
                                                                <td>{{ $data->paymentmethod_id->bank_name }}
                                                                    {{ $data->paymentmethod_id->account_number }}</td>
                                                                <td>
                                                                    <a class="img">
                                                                        <img class="img" src="../{{$data->payment_evidence_img}}" alt="" height="100" width="150">
                                                                    </a></td>
                                                                <td>
                                                                    <a href="{{route('admin.verifbuktitoep',['id' => $data->id])}}" class="btn btn-large btn-info"><strong>Verifikasi</strong></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="example2_info" role="status"
                                                    aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="example2_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="example2_previous">
                                                            <a href="#" aria-controls="example2" data-dt-idx="0"
                                                                tabindex="0" class="page-link">Previous</a>
                                                        </li>
                                                        <li class="paginate_button page-item active">
                                                            <a href="#" aria-controls="example2" data-dt-idx="1"
                                                                tabindex="0" class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="example2" data-dt-idx="2"
                                                                tabindex="0" class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="example2" data-dt-idx="3"
                                                                tabindex="0" class="page-link">3</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="example2" data-dt-idx="4"
                                                                tabindex="0" class="page-link">4</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="example2"
                                                                data-dt-idx="5" tabindex="0"
                                                                class="page-link">5</a>
                                                        </li>
                                                        <li class="paginate_button page-item ">
                                                            <a href="#" aria-controls="example2"
                                                                data-dt-idx="6" tabindex="0"
                                                                class="page-link">6</a>
                                                        </li>
                                                        <li class="paginate_button page-item next" id="example2_next">
                                                            <a href="#" aria-controls="example2"
                                                                data-dt-idx="7" tabindex="0"
                                                                class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('pages/admin/layouts/footer')
    </div>
</body>

</html>
