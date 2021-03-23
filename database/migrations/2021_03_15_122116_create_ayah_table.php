<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayah', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->year('tahun_lahir')->nullable();
            $table->string('jenjang_pendidikan', 50)->nullable();
            $table->string('pekerjaan', 50)->nullable();
            $table->float('penghasilan')->nullable();
            $table->bigInteger('nik')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayah');
    }
}
