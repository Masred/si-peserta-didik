<?php

namespace App\Exports;

use App\Models\PesertaDidik;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class PesertaDidikExport implements WithHeadings, ShouldAutoSize, FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        $peserta_didik = PesertaDidik::all();
        $data = [];
        foreach ($peserta_didik as $p) {
            $data[] = [
                $p->nama,
                $p->status,
                $p->jenis_kelamin,
                $p->nipd,
                $p->nisn,
                $p->tahun_masuk,
                $p->tempat_lahir,
                $p->tanggal_lahir,
                $p->nik,
                $p->no_kk,
                $p->agama,
                $p->alamat,
                $p->kelurahan,
                $p->kecamatan,
                $p->kota,
                $p->hp,
                $p->email,
                $p->tahun_keluar,
                $p->nama_ayah,
                $p->tahun_lahir_ayah,
                $p->jenjang_pendidikan_ayah,
                $p->pekerjaan_ayah,
                $p->penghasilan_ayah,
                $p->nik_ayah,
                $p->nama_ibu,
                $p->tahun_lahir_ibu,
                $p->jenjang_pendidikan_ibu,
                $p->pekerjaan_ibu,
                $p->penghasilan_ibu,
                $p->nik_ibu,
                $p->nama_wali,
                $p->tahun_lahir_wali,
                $p->jenjang_pendidikan_wali,
                $p->pekerjaan_wali,
                $p->penghasilan_wali,
                $p->nik_wali,
                $p->kode_rombel];
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'nama',
            'status',
            'jenis_kelamin',
            'nipd',
            'nisn',
            'tahun_masuk',
            'tempat_lahir',
            'tanggal_lahir',
            'nik',
            'no_kk',
            'agama',
            'alamat',
            'kelurahan',
            'kecamatan',
            'kota',
            'hp',
            'email',
            'tahun_keluar',
            'nama_ayah',
            'tahun_lahir_ayah',
            'jenjang_pendidikan_ayah',
            'pekerjaan_ayah',
            'penghasilan_ayah',
            'nik_ayah',
            'nama_ibu',
            'tahun_lahir_ibu',
            'jenjang_pendidikan_ibu',
            'pekerjaan_ibu',
            'penghasilan_ibu',
            'nik_ibu',
            'nama_wali',
            'tahun_lahir_wali',
            'jenjang_pendidikan_wali',
            'pekerjaan_wali',
            'penghasilan_wali',
            'nik_wali',
            'rombel'
        ];
    }
}
