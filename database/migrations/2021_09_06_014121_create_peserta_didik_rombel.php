<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaDidikRombel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_didik_rombel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rombel_id')->constrained('rombel');
            $table->string('nipd');
            $table->foreign('nipd')->references('nipd')->on('peserta_didik')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_didik_rombel');
    }
}
