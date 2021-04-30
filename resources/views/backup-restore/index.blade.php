@extends('layouts.main')

@section('title', 'Backup & Restore')
@section('backup-restore-menu', 'active')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="info-box">
                <form action="{{ route('backup-restore.backup') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-success text-white"
                            onclick="return confirm('Mau backup database?')">
                        <i class="fa fa-file-export fa-2x"></i>
                    </button>
                </form>
                <div class="info-box-content">
                    <span class="info-box-text">Backup</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <a class="btn btn-lg btn-primary text-white" data-toggle="modal" data-target="#restore-trigger">
                    <i class="fa fa-file-import fa-2x"></i>
                </a>

                <div class="info-box-content">
                    <span class="info-box-text">Restore</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- Modal Excel -->
            <div class="modal fade" id="restore-trigger" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload File Database (harus berformat .sql)</h5>
                        </div>
                        <form action="{{ route('backup-restore.restore') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('fileImport') is-invalid @enderror"
                                           id="restore" name="restore" required>
                                    <label class="custom-file-label" for="restore">Pilih file</label>
                                    @error('restore')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fas fa-times"></i> Batal
                                </button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-file-import"></i> Restore
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        @if(session('backup_restore'))
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'success',
            title: '{!! session('backup_restore') !!}'
        });
        @endif
    </script>
@endsection
