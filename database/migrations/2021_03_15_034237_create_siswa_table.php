<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('ayah_id')->nullable();
            $table->integer('ibu_id')->nullable();
            $table->integer('wali_id')->nullable();
            $table->integer('rombel_id')->nullable();
            $table->enum('status', ['Aktif', 'Pindah', 'Tamat', 'Pindahan', 'Keluar', 'Dikeluarkan']);
            $table->string('nama')->nullable();
            $table->bigInteger('nipd')->nullable();
            $table->enum('jenis_kelamin',['L','P'])->nullable();
            $table->bigInteger('nisn')->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->bigInteger('no_kk')->nullable();
            $table->string('agama', 50)->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('kelurahan', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kota', 50)->nullable();
            $table->smallInteger('kode_pos')->nullable();
            $table->string('jenis_tinggal', 50)->nullable();
            $table->string('alat_transportasi', 50)->nullable();
            $table->string('hp', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->smallInteger('anak_ke')->nullable();
            $table->smallInteger('jumlah_saudara_kandung')->nullable();
            $table->smallInteger('jarak_rumah_ke_sekolah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
