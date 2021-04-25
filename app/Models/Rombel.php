<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'rombel';
    protected $primaryKey = 'kode_rombel';
    protected $fillable = ['kode_rombel', 'kelas', 'kode_jurusan', 'kelompok', 'guru_id'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'kode_jurusan');
    }

    public function pesertaDidik(){
        return $this->hasMany(PesertaDidik::class, 'kode_rombel');
    }

    public function guru(){
        return $this->belongsTo(Guru::class);
    }
}
