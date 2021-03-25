@extends('layout.main')

@section('title', 'Jurusan')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Jurusan</h3>
                    <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm d-block float-right"><i
                            class="fa fa-plus"></i> Tambah</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 70px">No</th>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th style="width: 168px">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jurusans as $jurusan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jurusan->kode_jurusan }}</td>
                                <td>{{ $jurusan->nama_jurusan }}</td>
                                <td>

                                    <a href="{{ route('jurusan.edit', $jurusan->kode_jurusan) }}"
                                       class="btn btn-success btn-sm"><i class="far fa-edit"></i>Edit</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm d-inline" data-toggle="modal"
                                            data-target="#modalHapus{{ $jurusan->kode_jurusan }}">
                                        <i class="far fa-trash-alt"></i> Hapus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalHapus{{ $jurusan->kode_jurusan }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="exampleModalLabel">Yakin ingin menghapusnya?</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('jurusan.destroy', $jurusan->kode_jurusan) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <div class="row justify-content-center">
                                                            <div class="col-5">
                                                                <button type="submit" class="btn btn-danger">Ya, Hapus
                                                                </button>
                                                            </div>
                                                            <div class="col-5">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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
