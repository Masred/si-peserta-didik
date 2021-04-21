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
                $p->jenis_pendaftaran,
                $p->sekolah_asal,
                $p->tanggal_masuk,
                $p->status,
                $p->jenis_kelamin,
                $p->nipd,
                $p->nisn,
                $p->tempat_lahir,
                $p->tanggal_lahir,
                $p->nik,
                $p->no_kk,
                $p->agama,
                $p->rt,
                $p->rw,
                $p->alamat,
                $p->kelurahan,
                $p->kecamatan,
                $p->kode_pos,
                $p->hp,
                $p->email,
                $p->keluar_karena,
                $p->pindah_ke,
                $p->alasan_keluar,
                $p->tanggal_keluar,
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
                str_replace('-', ' ', $p->kode_rombel)];
        }
        return $data;
    }

    public function headings(): array
    {
        return [
            'nama',
            'jenis_pendaftaran',
            'sekolah_asal',
            'tanggal_masuk',
            'status',
            'jenis_kelamin',
            'nipd',
            'nisn',
            'tempat_lahir',
            'tanggal_lahir',
            'nik',
            'no_kk',
            'agama',
            'rt',
            'rw',
            'alamat',
            'kelurahan',
            'kecamatan',
            'kode_pos',
            'hp',
            'email',
            'keluar_karena',
            'pindah_ke',
            'alasan_keluar',
            'tanggal_keluar',
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
