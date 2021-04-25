<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- favicon -->
    <link rel="icon" href="{{ asset('img/logo/Logo_SMK_Negeri_3_Tasikmalaya.png') }}" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-lightblue navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('user.edit') }}" class="nav-link">
                    <i class="fa fa-user"></i>
                    Profil
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-door-open"></i>
                    {{ __('Keluar') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-lightblue elevation-4">
        <!-- Brand Logo -->
        <p class="brand-link">
            <img src="{{ asset('img/logo/Logo_SMK_Negeri_3_Tasikmalaya.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">SMKN 3 Tasikmalaya</span>
        </p>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel pb-3 mb-3 d-flex">
                <div class="image img-size-64">
                    <img src="{{ asset('img/avatar/administrator.png') }}" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <h5 class="text-light mb-0">{{ Auth::user()->nama }}</h5>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}"
                           class="nav-link {{ (request()->routeIs('dashboard.index')) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    @if(auth()->user()->is_admin == 1)
                        <li class="nav-item">
                            <a href="{{route('user.index')}}"
                               class="nav-link @yield('user-menu')">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{route('jurusan.index')}}"
                           class="nav-link @yield('jurusan-menu')">
                            <i class="fa fa-university nav-icon"></i>
                            <p>Jurusan</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview @yield('gtk-open-menu')">
                        <a href="#" class="nav-link @yield('gtk-menu')">
                            <i class="nav-icon fas fa-user-graduate"></i>
                            <p>
                                GTK
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('guru.index') }}" class="nav-link @yield('guru-menu')">
                                    <i class="nav-icon"> </i>
                                    <i class="fa fa-chalkboard-teacher nav-icon"></i>
                                    <p>Guru</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tenaga-kependidikan.index') }}"
                                   class="nav-link @yield('tenaga-kependidikan-menu')">
                                    <i class="nav-icon"> </i>
                                    <i class="fa fa-user-tie nav-icon"></i>
                                    <p>Tenaga Kependidikan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview @yield('pd-open-menu')">
                        <a href="#" class="nav-link @yield('peserta-didik-menu')">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Peserta Didik
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('peserta-didik.aktif') }}"
                                   class="nav-link {{ (request()->routeIs('peserta-didik.aktif') or request()->routeIs('peserta-didik.create') or request()->routeIs('peserta-didik.edit') or request()->routeIs('peserta-didik.show'))? 'active': '' }}">
                                    <i class="nav-icon"> </i>
                                    <i class="far fa-check-circle nav-icon"></i>
                                    <p>PD Aktif</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('peserta-didik.keluar') }}"
                                   class="nav-link {{ (request()->routeIs('peserta-didik.keluar'))? 'active': '' }}">
                                    <i class="nav-icon"> </i>
                                    <i class="far fa-times-circle nav-icon"></i>
                                    <p>PD Keluar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('peserta-didik.export-excel') }}"
                                   class="nav-link"
                                   onclick="return confirm('Yakin ingin meng-export data peserta didik?')">
                                    <i class="nav-icon"> </i>
                                    <i class="fa fa-file-export nav-icon"></i>
                                    <p>Export ke Excel</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('peserta-didik.export-excel') }}"
                                   class="nav-link" data-toggle="modal"
                                   data-target="#import-excel">
                                    <i class="nav-icon"> </i>
                                    <i class="fa fa-file-import nav-icon"></i>
                                    <p>Import dari Excel</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rombel.index') }}" class="nav-link @yield('rombel-menu')">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Rombongan Belajar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('surat.index') }}" class="nav-link @yield('surat-menu')">
                            <i class="fa fa-envelope nav-icon"></i>
                            <p>Surat</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid pt-3">
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
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
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        Copyright &copy; 2021
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- Sweetalert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- additional script -->
<script>
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
</script>
@yield('script')
</body>
</html>
