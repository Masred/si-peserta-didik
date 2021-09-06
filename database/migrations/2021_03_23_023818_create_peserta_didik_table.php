<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didik', function (Blueprint $table) {
            $table->string('nipd')->primary();
            $table->enum('status', ['aktif', 'keluar'])->nullable()->default('aktif');
            $table->enum('jenis_pendaftaran', ['Siswa baru', 'Pindahan', 'Kembali bersekolah'])->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('nama')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('nisn')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nik')->nullable();
            $table->string('agama')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->enum('keluar_karena', ['Lulus', 'Mutasi', 'Dikeluarkan', 'Mengundurkan diri', 'Putus Sekolah', 'Wafat', 'Hilang'])->default(null)->nullable();
            $table->string('pindah_ke')->nullable();
            $table->string('alasan_keluar')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->text('alamat')->nullable();
            $table->tinyInteger('rt')->nullable();
            $table->tinyInteger('rw')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->Integer('kode_pos')->nullable();
            $table->string('hp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('nama_ayah')->nullable();
            $table->smallInteger('tahun_lahir_ayah')->nullable();
            $table->string('jenjang_pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->smallInteger('tahun_lahir_ibu')->nullable();
            $table->string('jenjang_pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->smallInteger('tahun_lahir_wali')->nullable();
            $table->string('jenjang_pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('no_kk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_didik');
    }
}
