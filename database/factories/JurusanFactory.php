<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurusanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jurusan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            [
                'kode_jurusan' => 'DKV',
                'nama_jurusan' => 'Desain Komunikasi Visual'
            ],
            [
                'kode_jurusan' => 'TEKSTIL',
                'nama_jurusan' => 'Tekstil'
            ],
            [
                'kode_jurusan' => 'KAYU',
                'nama_jurusan' => 'Kayu'
            ],
            [
                'kode_jurusan' => 'KULIT',
                'nama_jurusan' => 'Kulit'
            ],
            [
                'kode_jurusan' => 'LOGAM',
                'nama_jurusan' => 'Logam'
            ],
            [
                'kode_jurusan' => 'TKR',
                'nama_jurusan' => 'Teknik Kendaraan Ringan'
            ]
        ];
    }
}
