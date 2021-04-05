@extends('layout.main')

@section('title', 'Daftar Peserta Didik')
@section('rombel-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <p>Jurusan</p>
                </div>
                <div class="col-4">
                    <p>: {{ $rombel->jurusan->nama_jurusan }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>Rombongan Belajar</p>
                </div>
                <div class="col-4">
                    <p>: {{ $rombel->kelas }} {{ $rombel->kode_jurusan }} {{ $rombel->kelompok }}</p>
                </div>
            </div>
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1"
                               class="table table-bordered dataTable dtr-inline table-striped"
                               role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                >No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Nama
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">NIPD/NIS
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">NISN
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending" style="width: 50px">Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($peserta_didik as $pd)
                                <tr role="row">
                                    <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $pd->nama }}</td>
                                    <td>{{ $pd->nipd }}</td>
                                    <td>{{ $pd->nisn }}</td>
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
                                                <form
                                                    class="d-inline"
                                                    action="{{ route('peserta-didik.destroy', $pd->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            title="Delete"
                                                            class="btn btn-danger btn-sm d-inline btn-del">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
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
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
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
