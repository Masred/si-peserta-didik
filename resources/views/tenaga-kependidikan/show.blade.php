@extends('layouts.main')

@section('title', 'Detail Tenaga Kependidikan')
@section('gtk-open-menu', 'menu-open')
@section('gtk-menu', 'active')
@section('tenaga-kependidikan-menu', 'active')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title d-block float-left"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>
                    kembali</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h4>Tenaga Kependidikan</h4>
            <table class="table table-striped">
                <tr>
                    <td width="50%" class="text-right font-weight-bold">Nama</td>
                    <td>: {{ $tenaga_kependidikan->nama }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Nomor Induk Kependudukan (NIK)</td>
                    <td> : {{ $tenaga_kependidikan->nik }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Nomor Induk Pegawai (NIP)</td>
                    <td> : {{ $tenaga_kependidikan->nip }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Keterangan</td>
                    <td> : {{ $tenaga_kependidikan->keterangan }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Jenis Kelamin</td>
                    <td> : {{ ($tenaga_kependidikan->jenis_kelamin == 'L')? 'Laki-Laki':'Perempuan' }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Tempat dan tanggal Lahir</td>
                    <td> : {{ $tenaga_kependidikan->tempat_lahir . ', ' . date('d-m-Y', strtotime($tenaga_kependidikan->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Agama</td>
                    <td> : {{ $tenaga_kependidikan->agama }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Alamat</td>
                    <td>
                        : {{ $tenaga_kependidikan->alamat }} RT/RW {{ $tenaga_kependidikan->rt . '/' . $tenaga_kependidikan->rw }}
                    </td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kelurahan</td>
                    <td> : {{ $tenaga_kependidikan->kelurahan }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kecamatan</td>
                    <td> : {{ $tenaga_kependidikan->kecamatan }}</td>
                </tr>
                <tr>
                    <td class="text-right font-weight-bold">Kode Pos</td>
                    <td> : {{ $tenaga_kependidikan->kode_pos }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
