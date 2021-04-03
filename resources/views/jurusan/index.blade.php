@extends('layout.main')

@section('title', 'Jurusan')
@section('master-menu', 'active')
@section('jurusan-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Jurusan</h3>
            <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm d-block float-right"><i
                    class="fas fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered dataTable dtr-inline table-hover"
                               role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 50px">No
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Kode Jurusan
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Nama Jurusan
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending" style="width: 150px">
                                    Aksi
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
                                            <div class="col d-flex justify-content-end">
                                                <a href="{{ route('jurusan.edit', $jurusan->kode_jurusan) }}"
                                                   class="btn btn-success btn-sm"><i
                                                        class="far fa-edit"></i></a>
                                            </div>
                                            <div class="col">
                                                <form
                                                    class="d-inline float-left"
                                                    action="{{ route('jurusan.destroy', $jurusan->kode_jurusan) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
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
        $('.btn-del').click(function(e){
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
