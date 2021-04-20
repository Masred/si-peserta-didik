<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'peserta_didik';
    protected $fillable = ['status', 'terdaftar_sebagai', 'pindahan_dari', 'nama', 'nipd', 'jenis_kelamin', 'nisn', 'tempat_lahir', 'tanggal_masuk', 'keluar_karena', 'alasan_keluar', 'tanggal_keluar', 'tanggal_lahir', 'nik', 'no_kk', 'agama', 'alamat', 'kelurahan', 'kecamatan', 'kode_pos', 'hp', 'email', 'nama_ayah', 'tahun_lahir_ayah', 'jenjang_pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'nik_ayah', 'nama_ibu', 'tahun_lahir_ibu', 'jenjang_pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'nik_ibu', 'nama_wali', 'tahun_lahir_wali', 'jenjang_pendidikan_wali', 'pekerjaan_wali', 'penghasilan_wali', 'nik_wali', 'sekolah_asal', 'kode_rombel'];

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'kode_rombel');
    }
}
