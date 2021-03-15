<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali', function (Blueprint $table) {
            $table->integer('id', true);
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
        Schema::dropIfExists('wali');
    }
}
