<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rombel';
    protected $fillable = ['kelas', 'kode_jurusan', 'kelompok', 'guru_id', 'tahun_ajaran'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
