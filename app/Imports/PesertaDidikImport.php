<?php

namespace App\Imports;

use App\Models\PesertaDidik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertaDidikImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     *
     */
    public function model(array $row)
    {
//        dd($row);
        return new PesertaDidik([
            'nama' => $row['nama'],
            'status' => $row['status'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nipd' => $row['nipd'],
            'nisn' => $row['nisn'],
            'tahun_masuk' => $row['tahun_masuk'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'nik' => $row['nik'],
            'no_kk' => $row['no_kk'],
            'agama' => $row['agama'],
            'alamat' => $row['alamat'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kota' => $row['kota'],
            'hp' => $row['hp'],
            'email' => $row['email'],
            'tahun_keluar' => $row['tahun_keluar'],
            'nama_ayah' => $row['nama_ayah'],
            'tahun_lahir_ayah' => $row['tahun_lahir_ayah'],
            'jenjang_pendidikan_ayah' => $row['jenjang_pendidikan_ayah'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'penghasilan_ayah' => $row['penghasilan_ayah'],
            'nik_ayah' => $row['nik_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'tahun_lahir_ibu' => $row['tahun_lahir_ibu'],
            'jenjang_pendidikan_ibu' => $row['jenjang_pendidikan_ibu'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'penghasilan_ibu' => $row['penghasilan_ibu'],
            'nik_ibu' => $row['nik_ibu'],
            'nama_wali' => $row['nama_wali'],
            'tahun_lahir_wali' => $row['tahun_lahir_wali'],
            'jenjang_pendidikan_wali' => $row['jenjang_pendidikan_wali'],
            'pekerjaan_wali' => $row['pekerjaan_wali'],
            'penghasilan_wali' => $row['penghasilan_wali'],
            'nik_wali' => $row['nik_wali'],
            'kode_rombel' => $row['rombel']
        ]);
    }
}
