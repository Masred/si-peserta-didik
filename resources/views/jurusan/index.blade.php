@extends('layout.main')

@section('title', 'Jurusan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Jurusan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending" style="width: 50px">No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Kode Jurusan
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Nama Jurusan
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending" style="width: 150px">Aksi
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($jurusans as $jurusan)
                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $jurusan->kode_jurusan }}</td>
                                    <td>{{ $jurusan->nama_jurusan }}</td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col">
                                                <a href="{{ route('jurusan.edit', $jurusan->kode_jurusan) }}"
                                                   class="btn btn-success btn-sm d-inline-block float-right"><i class="far fa-edit"></i>Edit</a>
                                            </div>
                                            <div class="col">
                                                <form
                                                    class="d-inline float-left"
                                                    action="{{ route('jurusan.destroy', $jurusan->kode_jurusan) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin mau dihapus?')"
                                                            class="btn btn-danger btn-sm d-inline">
                                                        <i class="far fa-trash-alt"></i> Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">No</th>
                                <th rowspan="1" colspan="1">Kode Jurusan</th>
                                <th rowspan="1" colspan="1">Nama Jurusan</th>
                                <th rowspan="1" colspan="1">Aksi</th>
                            </tr>
                            </tfoot>
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
            timer: 5000
        });
        Toast.fire(
            'Berhasil!',
            '{!! session('status') !!}',
            'success'
        );
        @endif
    </script>
@endsection
