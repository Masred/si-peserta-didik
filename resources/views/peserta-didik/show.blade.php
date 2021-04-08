@extends('layouts.main')

@section('title', 'Detail Peserta Didik')
@section('peserta-didik-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h4>Peserta Didik</h4>
            <table class="table">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $peserta_didik->nama }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        : @if($peserta_didik->status == 'aktif')
                            <span class="badge bg-success">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'keluar')
                            <span class="badge bg-danger">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'dikeluarkan')
                            <span class="badge bg-danger">keluar</span>
                            <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'pindah')
                            <span class="badge bg-danger">keluar</span>
                            <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'tamat')
                            <span class="badge bg-danger">keluar</span>
                            <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                        @elseif($peserta_didik->status == 'pindahan')
                            <span class="badge bg-success">aktif</span>
                            <span class="badge bg-warning">{{ $peserta_didik->status }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : {{ ($peserta_didik->jenis_kelamin == 'L')? 'Laki-Laki': 'Perempuan' }}</td>
                </tr>
                <tr>
                    <td>Nomor Induk Peserta Didik (NIPD) / Nomor Induk Siswa (NIS)</td>
                    <td>: {{ $peserta_didik->nipd }}</td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Induk Siswa Nasional (NISN)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nisn }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Masuk</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_masuk }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Keluar</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_keluar }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tempat Lahir</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tempat_lahir }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tanggal Lahir</p>
                    </td>
                    <td>
                        : {{ date('d-m-Y', strtotime($peserta_didik->tanggal_lahir)) }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Induk Kependudukan (NIK)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nik }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Kartu Keluarga (KK)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->no_kk }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Agama</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->agama }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Alamat</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->alamat }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Kelurahan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->kelurahan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Kecamatan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->kecamatan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Kota</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->kota }}
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Nomor HP</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->hp }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Email</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->email }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jurusan</p>
                    </td>
                    <td>
                        : {{ (!$peserta_didik->kode_rombel)? '': $peserta_didik->rombel->jurusan->nama_jurusan }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Rombongan Belajar</p>
                    </td>
                    <td>
                        : {{ (!$peserta_didik->kode_rombel)? '' : $peserta_didik->rombel->kelas .' '.$peserta_didik->rombel->kode_jurusan.' '.$peserta_didik->rombel->kelompok }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Ayah Kandung</h4></td>
                </tr>
                <tr>
                    <td>
                        <p>Nama</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_ayah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Lahir</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_ayah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jenjang Pendidikan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Pekerjaan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Penghasilan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_ayah }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Induk Kependudukan (NIK)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_ayah }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Ibu Kandung</h4></td>
                </tr>
                <tr>
                    <td>
                        <p>Nama</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_ibu }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Lahir</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_ibu }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jenjang Pendidikan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Pekerjaan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Penghasilan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_ibu }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Induk Kependudukan (NIK)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_ibu }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h4>Wali</h4></td>
                </tr>
                <tr>
                    <td>
                        <p>Nama</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nama_wali }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Tahun Lahir</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->tahun_lahir_wali }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Jenjang Pendidikan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->jenjang_pendidikan_wali }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Pekerjaan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->pekerjaan_wali }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Penghasilan</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->penghasilan_wali }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nomor Induk Kependudukan (NIK)</p>
                    </td>
                    <td>
                        : {{ $peserta_didik->nik_wali }}
                    </td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
