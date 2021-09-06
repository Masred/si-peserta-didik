<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'surat';
    protected $fillable = ['nomor_surat', 'jenis_surat', 'alasan_dibuat', 'tanggal', 'nipd'];

    public function pesertaDidik()
    {
        return $this->belongsTo(PesertaDidik::class, 'nipd');
    }
}
