<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => 1,
        ])->create();
        User::factory()->count(1)->create();

        Jurusan::factory()->create();
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'X-DKV-' . $i,
                'kelas' => 'X',
                'kode_jurusan' => 'DKV',
                'kelompok' => $i
            ])->create();
        }
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'XI-DKV-' . $i,
                'kelas' => 'XI',
                'kode_jurusan' => 'DKV',
                'kelompok' => $i
            ])->create();
        }
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'XII-DKV-' . $i,
                'kelas' => 'XII',
                'kode_jurusan' => 'DKV',
                'kelompok' => $i
            ])->create();
        }
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'X-RPL-' . $i,
                'kelas' => 'X',
                'kode_jurusan' => 'RPL',
                'kelompok' => $i
            ])->create();
        }
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'XI-RPL-' . $i,
                'kelas' => 'XI',
                'kode_jurusan' => 'RPL',
                'kelompok' => $i
            ])->create();
        }
        for ($i = 1; $i <= 3; $i++){
            Rombel::factory()->state([
                'kode_rombel' => 'XII-RPL-' . $i,
                'kelas' => 'XII',
                'kode_jurusan' => 'RPL',
                'kelompok' => $i
            ])->create();
        }

        PesertaDidik::factory()->count(100)->create();
    }
}
