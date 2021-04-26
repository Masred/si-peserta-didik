@extends('layouts.kop-surat')
@section('title', 'Laporan Surat')
@section('content')
    <h3 align="center" style="margin: 10px 10px 0;">LAPORAN SURAT</h3>
    <h3 align="center" style="margin-bottom: 10px">dari {{ date('d-m-Y', strtotime($dari)) }} sampai {{ date('d-m-Y', strtotime($sampai)) }}</h3>
    <table width="100%" border="1px" cellpadding="5px" cellspacing="0"
           style="font-size: 10px;font-family: Arial,serif;">
        <tr>
            <th>No.</th>
            <th>Nomor Surat</th>
            <th>Jenis Surat</th>
            <th>Alasan Dibuat</th>
            <th>Tanggal</th>
            <th>Nama Peserta Didik</th>
        </tr>
        @foreach($surat as $s)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $s->nomor_surat }}</td>
                <td>{{ $s->jenis_surat }}</td>
                <td>{{ $s->alasan_dibuat }}</td>
                <td>{{ date('d-m-Y', strtotime($s->tanggal)) }}</td>
                <td>{{ $s->pesertaDidik->nama }}</td>
            </tr>
        @endforeach
    </table>
@endsection
