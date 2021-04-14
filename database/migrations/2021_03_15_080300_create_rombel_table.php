<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRombelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rombel', function (Blueprint $table) {
            $table->string('kode_rombel', 15)->primary();
            $table->string('kelas', 3);
            $table->string('kode_jurusan');
            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('jurusan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->smallInteger('kelompok');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rombel');
    }
}
