@extends('layouts.main')
@section('title', 'Profil Pengguna')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i
                                    class="fa fa-arrow-left"></i> kembali</a></h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update') }}">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                           class="form-control @error('nama') is-invalid @enderror" name="nama"
                                           value="{{ old('nama', $user->nama) }}" placeholder="Masukan Nama" required
                                           autocomplete="nama" autofocus>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username', $user->username) }}" placeholder="Masukan Username"
                                           required autocomplete="username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           placeholder="Masukan Password baru">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
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
