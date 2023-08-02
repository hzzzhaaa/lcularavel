<!DOCTYPE html>
<html lang="en">

<head>
    @include('pages/mahasiswa/layouts/_header')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @include('sweetalert::alert')
    <div class="wrapper">

        @include('pages/mahasiswa/layouts/navbar')
        @include('pages/mahasiswa/layouts/sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Rincian Ujian</h1>
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
                            @foreach ($data as $data)
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                <i class="fas fa-globe"></i> {{ $data->event_id->event_name }}
                                                {{ $data->event_id->type }} {{ $data->event_id->test_based }}
                                                @if ($data->schedule_id == null)
                                                    <small class="float-right"></small>
                                                @else
                                                    <small class="float-right">{{ $data->schedule_id->date }}</small>
                                                @endif
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    @if ($data->status == 'verified')
                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-6">
                                                <p class="lead">SIlahkan Pilih Jadwal Yang Tersedia</p>
                                                </p>
                                            </div>
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <button type="button" data-toggle="modal" data-target="#modal-jadwal{{$data->id}}"
                                                    class="btn btn-success float-right"><i
                                                        class="far fa-calendar-alt"></i> Pilih Jadwal
                                                </button>
                                            </div>
                                        </div>


                                    @elseif ($data->status == 'registered')
                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-6">
                                                <p class="lead">Rincian Jadwal</p>
                                                </p>
                                                <p class="lead">Nomer Registrasi : {{$data->registration_number}}</p>
                                                </p>
                                            </div>
                                        </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-12">
                                                <button type="button" data-toggle="modal" data-target="#modal-ganti{{$data->id}}"
                                                    class="btn btn-success float-right"><i class="far fa-calendar-alt"></i>
                                                    Ganti Jadwal
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            <p class="lead">Payment Methods: {{ $data->paymentmethod_id->bank_name }}</p>
                                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                Nomer Rekening : {{ $data->paymentmethod_id->account_number }}
                                            </p>
                                        </div>
                                    </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-12">
                                            <button type="button" data-toggle="modal" data-target="#modal-primary{{$data->id}}"
                                                class="btn btn-success float-right"><i class="far fa-credit-card"></i>
                                                Submit
                                                Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        @endif


                    </div>
                    <div class="modal fade" id="modal-primary{{$data->id}}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h4 class="modal-title">Upload Bukti Bayar</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" enctype="multipart/form-data" method="POST"
                                        action="{{ route('uploadbukti', ['id' => $data->id]) }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tolong masukan bukti
                                                    pembayaran</label>
                                                <input type="file" class="form-control-file" id="bukti"
                                                    name="bukti">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="modal-jadwal{{$data->id}}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Jadwal</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" method="POST" action="">
                                        @csrf
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Ujian</th>
                                                        <th>Tanggal Ujian</th>
                                                        <th>Jumlah Peserta</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->schedule_list as $l)
                                                        <tr>
                                                            <td>{{ $l->event_id->event_name }}
                                                                {{ $l->event_id->type }}
                                                                {{ $l->event_id->test_based }}</td>
                                                            <td>{{ $l->date }}</td>
                                                            <td>
                                                                {{ $l->current_participant }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('pilihjadwal', ['id' => $data->id, 'schedule_id' => $l->id]) }}"
                                                                    class="btn btn-large btn-info"><strong>Pilih
                                                                        Jadwal</strong></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="modal-ganti{{$data->id}}" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-light">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pilih Jadwal</h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" method="POST" action="">
                                        @csrf
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Ujian</th>
                                                        <th>Tanggal Ujian</th>
                                                        <th>Jumlah Peserta</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->schedule_list as $l)
                                                        <tr>
                                                            <td>{{ $l->event_id->event_name }}
                                                                {{ $l->event_id->type }}
                                                                {{ $l->event_id->test_based }}</td>
                                                            <td>{{ $l->date }}</td>
                                                            <td>
                                                                {{ $l->current_participant }}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('pilihjadwal', ['id' => $data->id, 'schedule_id' => $l->id]) }}"
                                                                    class="btn btn-large btn-info"><strong>Pilih
                                                                        Jadwal</strong></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    @endforeach
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
