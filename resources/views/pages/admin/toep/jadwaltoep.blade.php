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
                                            <div class="col-sm-12 col-md-7">
                                                <div class="col-12 col-sm-6 col-md-3">
                                                    <a href="{{route("export.excel",['id'=>$id])}}" class="btn btn-primary">
                                                        Export Excel
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="col-12 col-sm-6 col-md-3">
                                                    <a href="#modal-import" data-toggle="modal" class="btn btn-primary">
                                                        Import Hasil Ujian
                                                    </a>
                                                </div>
                                            </div>
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
                                                                Nomer Registrasi</th>
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
                                                                <td>
                                                                    {{$data->registration_number}}
                                                                <td>
                                                                    <a href="{{route("sertifikat",['id'=>$id,'registration_number'=>$data->registration_number])}}">Buat Sertifikat</a>
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

                    <div class="modal fade" id="modal-import" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content bg-light">
                            <div class="modal-header">
                                <h4 class="modal-title">IMPORT HASIL UJIAN</h4>
                            </div>
                            <div class="modal-body">
                                <form enctype="multipart/form-data" method="post" action="{{route('importExcel',['id'=> $id])}}">
                                    @csrf
                                <td><input type="file" class="form-control-file" id="import" name="import">
                                </td>
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
