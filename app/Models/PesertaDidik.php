<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'peserta_didik';
    protected $fillable = ['status','nama','nipd','jenis_kelamin','nisn','tempat_lahir','tanggal_lahir','nik','no_kk','agama','alamat','kelurahan','kecamatan','kota','tempat_tinggal','moda_transportasi','hp','email','anak_ke','jumlah_saudara_kandung','jarak_rumah_ke_sekolah','nama_ayah','tahun_lahir_ayah','jenjang_pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','nik_ayah','nama_ibu','tahun_lahir_ibu','jenjang_pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu','nik_ibu','nama_wali','tahun_lahir_wali','jenjang_pendidikan_wali','pekerjaan_wali','penghasilan_wali','nik_wali', 'rombel_id'];

    public function rombel(){
        return $this->belongsTo(Rombel::class);
    }
}
