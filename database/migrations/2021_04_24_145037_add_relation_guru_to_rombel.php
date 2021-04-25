<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationGuruToRombel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rombel', function (Blueprint $table) {
            $table->foreignId('guru_id')->nullable()->constrained('guru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rombel', function (Blueprint $table) {
            $table->dropConstrainedForeignId('guru_id');
        });
    }
}
