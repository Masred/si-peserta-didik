@extends('layouts.main')

@section('title', 'Peserta Didik')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Peserta Didik</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <form
                            action="{{ route('peserta-didik.multiple-destroy') }}"
                            method="post">
                        @csrf
                        @method('delete')
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm d-block float-right" data-toggle="modal"
                                    data-target="#import-excel">
                                <i class="fas fa-file-import"></i> Import
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success btn-sm d-block float-right mr-2"
                                    data-toggle="modal"
                                    data-target="#print-pdf">
                                <i class="fa fa-print"></i> Print
                            </button>
                            <div class="dropdown">
                                <a class="btn btn-success dropdown-toggle btn-sm d-block float-right mx-2" href="#"
                                   role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    <i class="fas fa-file-export"></i> Export
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a href="{{ route('peserta-didik.export-excel') }}"
                                       class="dropdown-item"><i class="far fa-file-excel mr-1"></i> Excel</a>
                                    <a href="{{ route('peserta-didik.export-pdf') }}"
                                       class="dropdown-item"><i class="far fa-file-pdf mr-1"></i> PDF</a>
                                </div>
                            </div>
                            <a href="{{ route('peserta-didik.create') }}"
                               class="btn btn-primary btn-sm d-block float-right"><i
                                    class="fas fa-plus"></i> Tambah</a>
                            <button type="submit"
                                    title="Delete"
                                    class="btn btn-danger btn-sm d-inline btn-del d-inline-block float-right mr-2">
                                <i class="far fa-trash-alt"></i> Hapus
                            </button>
                            <table id="example1"
                                   class="table table-bordered dataTable dtr-inline table-striped"
                                   role="grid"
                                   aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc_disabled sorting_desc_disabled" class="sorting"
                                        tabindex="0" aria-controls="example1" rowspan="1" colspan="1" width="10px">
                                        <input type="checkbox" class="custom-checkbox" id="pilih_semua"
                                               name="pilih_semua">
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                    >No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Nama
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">JK
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">NIPD/NIS
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">NISN
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Rombel
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Terdaftar Sebagai
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Status
                                    </th>
                                    <th class="sorting sorting_asc_disabled sorting_desc_disabled" tabindex="0"
                                        aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending" style="width: 50px">
                                        Aksi
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($peserta_didik as $pd)
                                    <tr role="row">
                                        <td>
                                            <input type="checkbox" class="form-check"
                                                   name="id[]" value="{{ $pd->id }}">
                                        </td>
                                        <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                        <td>{{ $pd->nama }}</td>
                                        <td>{{ $pd->jenis_kelamin }}</td>
                                        <td>{{ $pd->nipd }}</td>
                                        <td>{{ $pd->nisn }}</td>
                                        <td>{{ (!empty($pd->kode_rombel))? '' :str_replace('-', ' ', $pd->kode_rombel) }}</td>
                                        <td>{{ $pd->jenis_pendaftaran }}</td>
                                        <td>
                                            @if($pd->status == 'aktif')
                                                <span class="badge bg-success">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'keluar')
                                                <span class="badge bg-danger">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'dikeluarkan')
                                                <span class="badge bg-danger">keluar</span>
                                                <span class="badge bg-warning">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'pindah')
                                                <span class="badge bg-danger">keluar</span>
                                                <span class="badge bg-warning">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'tamat')
                                                <span class="badge bg-danger">keluar</span>
                                                <span class="badge bg-warning">{{ $pd->status }}</span>
                                            @elseif($pd->status == 'pindahan')
                                                <span class="badge bg-success">aktif</span>
                                                <span class="badge bg-warning">{{ $pd->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="{{ route('peserta-didik.show', $pd->id) }}"
                                                       class="btn btn-primary btn-sm d-inline-block">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('peserta-didik.edit', $pd->id) }}"
                                                       class="btn btn-success btn-sm mx-2"><i
                                                            class="far fa-edit"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- Modal Excel -->
    <div class="modal fade" id="import-excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Excel</h5>
                </div>
                <form action="{{ route('peserta-didik.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('fileImport') is-invalid @enderror"
                                   id="exampleInputFile" name="fileImport">
                            <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            <small class="form-text text-muted">File yang dipilih harus berformat xlsx atau xls.</small>
                            @error('fileImport')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-file-import"></i> Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Print -->
    <div class="modal fade" id="print-pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Print Data Peserta Didik</h5>
                </div>
                <form action="{{ route('peserta-didik.print') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <select name="kelas" class="custom-select @error('kelas') is-invalid @enderror" required>
                            <option value="">PILIH</option>
                            <option value="Semua">Semua</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                        @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-print"></i> Print
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#pilih_semua").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $(document).ready(function () {
            $('.btn-del').attr('disabled', true);
            $('input[type="checkbox"]').click(function () {
                if ($(this).prop('checked') === true) {
                    $('.btn-del').attr('disabled', false);
                } else {
                    $('.btn-del').attr('disabled', true);
                }
            });
        });
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
        @error('fileImport')
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'error',
            title: '{!! $message !!}'
        });
        @enderror
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

        $(function () {
            bsCustomFileInput.init();
        });

        $('.btn-del').click(function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Ingin menghapus data?',
                text: 'Data yang telah dihapus tidak dapat kembali lagi',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $(this).parent().submit()
                }
            })
        });
    </script>
@endsection
