<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\PesertaDidik;
use App\Models\Rombel;
use App\Models\TenagaKependidikan;
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

        // Jurusan::factory()->create();

        // $a = ['X KULIT 2', 'X TKR 3', 'XII TKR 1', 'XII KULIT 2', 'XII DKV 2', 'XII LOGAM 3', 'XII KAYU 1', 'X LOGAM 1', 'XI LOGAM 3', 'XI TKR 3', 'XII TKR 2', 'XI TKR 2', 'XI DKV 4', 'XI KAYU 2', 'X LOGAM 3', 'X KULIT 1', 'XII TKR 3', 'XII DKV 3', 'XI KAYU 3', 'XI LOGAM 4', 'XII LOGAM 4', 'XI KULIT 1', 'X TEKSTIL 2', 'X TEKSTIL 3', 'XII DKV 4', 'XII TEKSTIL 1', 'XII TEKSTIL 3', 'X TKR 2', 'XI DKV 3', 'XII KULIT 3', 'XI TKR 1', 'XII LOGAM 2', 'XI DKV 1', 'XI TEKSTIL 3', 'XI LOGAM 2', 'X TKR 1', 'XI LOGAM 1', 'X TEKSTIL 1', 'X KAYU 2', 'X DKV 4', 'X DKV 2', 'XII LOGAM 1', 'XI KAYU 1', 'X KAYU 1', 'XII DKV 1', 'XI TEKSTIL 2', 'XII KULIT 1', 'X LOGAM 4', 'XI TEKSTIL 1', 'XII TEKSTIL 2', 'X DKV 3', 'XII TEKSTIL 4', 'X LOGAM 2', 'XII KAYU 2', 'X DKV 1', 'XI KULIT 2', 'XI DKV 2'];
        // foreach ($a as $b) {
        //     $c = explode(' ', $b);
        //     Rombel::factory()->state([
        //         'kode_rombel' => str_replace(' ', '-', $b),
        //         'kelas' => $c[0],
        //         'kode_jurusan' => $c[1],
        //         'kelompok' => $c[2]
        //     ])->create();
        // }

        // PesertaDidik::factory()->count(300)->create();

        Guru::factory()->state([
            'nama' => 'Drs. H. OOM SUPARMAS, M.Pd.',
            'keterangan' => 'Kelapa Sekolah',
            'nip' => 196209101986031011
        ])->create();
        Guru::factory()->count(49)->create();

        TenagaKependidikan::factory()->state([
            'nama' => 'Dra. Hj. HADIANA ',
            'keterangan' => 'Kasubbag. Tata Usaha',
            'nip' => 196609081986032006
        ])->create();
        TenagaKependidikan::factory()->count(49)->create();
    }
}
