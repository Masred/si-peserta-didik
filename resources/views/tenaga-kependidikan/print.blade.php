@extends('layouts.kop-surat')
@section('title', 'Data Tenaga Kependidikan')
@section('content')
    <h3 align="center" style="margin: 10px">DATA TENAGA KEPENDIDIKAN</h3>
    <table width="100%" border="1px" cellpadding="5px" cellspacing="0"
           style="font-size: 10px;font-family: Arial,serif;">
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>JK</th>
            <th>Tempat Tanggal Lahir</th>
        </tr>
        @foreach($tenaga_kependidikan as $tk)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td>{{ $tk->nama }}</td>
                <td>{{ $tk->nip }}</td>
                <td align="center">{{ $tk->jenis_kelamin }}</td>
                <td>{{ $tk->tempat_lahir }}, {{ date('d-m-Y', strtotime($tk->tanggal_lahir)) }}</td>
            </tr>
        @endforeach
    </table>
@endsection
