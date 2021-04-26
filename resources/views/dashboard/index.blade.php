@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Jumlah Peserta Didik per Rombel</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered dataTable dtr-inline table-striped"
                                       role="grid"
                                       aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending"
                                            style="width: 50px">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Nama Rombel
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">L
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">P
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Jumlah
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">Lulus
                                        </th>
                                        <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                            aria-controls="example1" rowspan="1" colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending"
                                            style="width: 20px">
                                            Mutasi
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rombels as $rombel)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                            <td>{{ str_replace('-', ' ', $rombel->kode_rombel) }}</td>
                                            <td>{{ $rombel->lakilaki }}</td>
                                            <td>{{ $rombel->perempuan }}</td>
                                            <td>{{ $rombel->peserta_didik_count }}</td>
                                            <td>{{ $rombel->lulus }}</td>
                                            <td>{{ $rombel->mutasi }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fa fa-university"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jurusan</span>
                    <span class="info-box-number">{{ $total_jurusan }}</span>
                </div>
            </div>
            <!-- /.info-box-content -->
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Rombongan Belajar</span>
                    <span class="info-box-number">{{ $total_rombel }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-pink"><i class="fas fa-chalkboard-teacher"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Guru</span>
                    <span class="info-box-number">{{ $total_guru }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-fuchsia"><i class="fas fa-user-tie"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Tenaga Kependidikan</span>
                    <span class="info-box-number">{{ $total_tenaga_kependidikan }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fa fa-graduation-cap"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Peserta Didik</span>
                    <span class="info-box-number">{{ $total_peserta_didik }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box">
                <span class="info-box-icon bg-danger"><i class="fa fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Surat</span>
                    <span class="info-box-number">{{ $total_surat }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
