<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         Jurusan::factory()->create();
         Rombel::factory()->count(5)->create();
         PesertaDidik::factory()->count(200)->create();
    }
}
