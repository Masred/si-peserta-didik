@extends('layout.main')

@section('title', 'Peserta Didik')
@section('master-menu', 'active')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Peserta Didik</h3>
            <a href="{{ route('peserta-didik.create') }}" class="btn btn-primary btn-sm d-block float-right"><i
                    class="fas fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1"
                               class="table table-bordered dataTable dtr-inline table-hover"
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
                                    aria-label="Platform(s): activate to sort column ascending">JK
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Aksi
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
                                    <td>{{ $pd->jenis_kelamin }}</td>
                                    <td>{{ $pd->status }}</td>
                                    <td>
                                        <a href="{{ route('peserta-didik.show', $pd->id) }}"
                                           class="btn btn-primary btn-sm d-inline-block">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('peserta-didik.edit', $pd->id) }}"
                                           class="btn btn-success btn-sm align-self-center"><i
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
