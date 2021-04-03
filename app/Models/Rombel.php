<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'rombel';
    protected $fillable = ['nama_rombel', 'kelas', 'kode_jurusan', 'kelompok'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'kode_jurusan');
    }

    public function pesertaDidik(){
        return $this->belongsTo(PesertaDidik::class);
    }
}
