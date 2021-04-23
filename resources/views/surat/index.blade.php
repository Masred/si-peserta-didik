@extends('layouts.main')

@section('title', 'Surat')
@section('surat-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Surat</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="{{ route('surat.create') }}"
                           class="btn btn-primary btn-sm d-block float-right ml-2"><i
                                class="fas fa-plus"></i> Buat Surat</a>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Nomor Surat
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Jenis Surat
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Tanggal
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Nama Peserta Didik
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($surat as $s)
                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $s->nomor_surat }}</td>
                                    <td>{{ $s->jenis_surat }}</td>
                                    <td>{{ \Carbon\Carbon::parse($s->tanggal)->isoFormat('D MMMM Y') }}</td>
                                    <td>{{ $s->pesertaDidik->nama }}</td>
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
@endsection
@section('script')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        @if(session('status'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'success',
            title: '{!! session('status') !!}'
        });
        @endif
    </script>
@endsection
