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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-success d-block float-right" data-toggle="modal"
                                data-target="#staticBackdrop">
                            <i class="fa fa-question"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Bantuan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Cara Mencetak Surat</h4>
                                        <ol>
                                            <li>
                                                <p>Klik tombol Buat Surat</p>
                                                <img src="{{ asset('img/bantuan/tambah/tambah-surat.png') }}"
                                                     class="img-fluid">
                                            </li>
                                            <li><p>Isi kolom lalu klik tombol Cetak</p></li>
                                        </ol>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    </script>
@endsection
