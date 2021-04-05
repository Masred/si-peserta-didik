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
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('status', ['aktif', 'pindah', 'tamat', 'pindahan', 'keluar', 'dikeluarkan']);
            $table->enum('jenis_kelamin',['L','P'])->nullable();
            $table->string('nipd')->nullable();
            $table->string('nisn')->nullable();
            $table->year('tahun_masuk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota')->nullable();
            $table->string('hp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->year('tahun_keluar')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->year('tahun_lahir_ayah')->nullable();
            $table->string('jenjang_pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->bigInteger('nik_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->year('tahun_lahir_ibu')->nullable();
            $table->string('jenjang_pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->bigInteger('nik_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->year('tahun_lahir_wali')->nullable();
            $table->string('jenjang_pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->bigInteger('nik_wali')->nullable();
            $table->string('kode_rombel', 15)->nullable();
            $table->foreign('kode_rombel')->references('kode_rombel')->on('rombel')->nullOnDelete()->cascadeOnUpdate();
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
