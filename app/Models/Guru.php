<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'guru';
    protected $fillable = ['nama', 'nik', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'rt', 'rw', 'dusun', 'kelurahan', 'kecamatan', 'kode_pos'];

    public function rombel()
    {
        return $this->hasOne(Rombel::class);
    }
}
