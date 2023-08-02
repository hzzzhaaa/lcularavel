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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$verifcount}}</h3>

                  <p>Verifikasi Pembayaran</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{route("admin.verifbayartoep")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                      <div class="row">
                        <h3 style="margin-top:10px" class="card-title">Jadwal Aktif</h3>
                        <div class="col-sm-12 col-md-7">
                            <div class="col-12 col-sm-6 col-md-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                    Tambah Jadwal
                                </button>
                            </div>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                      <thead>
                      <tr><th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Event</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tanggal Ujian</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Waktu Ujian</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Jumlah Partisipan</th>
                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Aksi</th></tr>
                      </thead>
                      <tbody>
                      @foreach ($data as $data)
                      <tr>
                        <td><a href="{{route("list.peserta.toep",['id'=>$data->id])}}" aria-controls="example2" data-dt-idx="0"
                            tabindex="0" class="page-link">{{$data->event_name}} {{$data->event_id->type}} {{$data->event_id->test_based}}</a></td>
                        <td>{{$data->date}}</td>
                        <td>{{$data->time}}</td>
                        <td>{{$data->current_participant}}/{{$data->max_participant}}</td>
                        <td></td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                            </li>
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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
        <div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                <h4 class="modal-title">Tambah Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('buat.jadwal.toep')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEvent">Event</label>
                                <select name="eventid" class="custom-select">
                                    <option value="1">TOEP Reguler PBT</option>
                                    <option value="3">TOEP Ekspres PBT</option>
                                    <option value="2">TOEP Reguler CBT</option>
                                    <option value="4">TOEP Ekspres CBT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date and time:</label>
                                  <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                      <input type="datetime-local" name="date" class="form-control datetimepicker-input" data-target="#reservationdatetime">
                                  </div>
                              </div>
                            <div class="form-group">
                                <label for="inputMaxParticipant">Max Participant</label>
                                <input type="text" class="form-control" name="maxparticipant" placeholder="Enter maxparticipant of a Event" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputMaxParticipant">Link Zoom Meeting</label>
                                <input type="text" class="form-control" name="link" placeholder="Enter Link Zoom Meeting" required="">
                                <hr>
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
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('pages/admin/layouts/footer')

</body>
</html>
