@extends('layouts.kop-surat')
@section('title', 'Data Peserta Didik')
@section('content')
    <h4 align="center" style="margin: 10px">
        @if($keterangan == 'AKTIF')
            DATA PESERTA DIDIK AKTIF
        @elseif($keterangan == 'ALUMNI')
            DATA ALUMNI
        @elseif($keterangan == 'ALUMNI-JURUSAN')
            DATA ALUMNI JURUSAN {{ strtoupper($peserta_didik[0]->nama_jurusan) }}
        @elseif($keterangan == 'KELAS')
            DATA PESERTA DIDIK AKTIF KELAS @if($peserta_didik[0]->kelas == 'X')
                10 @elseif($peserta_didik[0]->kelas == 'XI') 11 @elseif($peserta_didik[0]->kelas == 'XII')
                12 @else {{ $peserta_didik[0]->kode_rombel }} @endif
        @elseif($keterangan == 'JURUSAN')
            DATA PESERTA DIDIK AKTIF KELAS @if($peserta_didik[0]->kelas == 'X')
                10 @elseif($peserta_didik[0]->kelas == 'XI') 11 @elseif($peserta_didik[0]->kelas == 'XII') 12 @endif
            JURUSAN {{ strtoupper($peserta_didik[0]->nama_jurusan) }}
        @endif
    </h4>
    <table width="100%" border="1px" cellpadding="5px" cellspacing="0"
           style="font-size: 10px;font-family: Arial,serif;">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIPD</th>
            <th>Rombel</th>
            <th>JK</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Email</th>
        </tr>
        @foreach($peserta_didik as $pd)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $pd->nama }}</td>
                <td>{{ $pd->nipd }}</td>
                <td>{{ str_replace('-', ' ', $pd->kode_rombel) }}</td>
                <td align="center">{{ $pd->jenis_kelamin }}</td>
                <td>{{ $pd->tempat_lahir }}, {{ date('d-m-Y', strtotime($pd->tanggal_lahir)) }}</td>
                <td>{{ $pd->hp }}</td>
                <td>{{ $pd->email }}</td>
            </tr>
        @endforeach
    </table>
@endsection
