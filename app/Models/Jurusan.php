<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'jurusan';
    protected $primaryKey = 'kode_jurusan';
    protected $fillable = ['kode_jurusan', 'nama_jurusan'];

    public function rombel(){
        return $this->hasMany(Rombel::class);
    }
}
