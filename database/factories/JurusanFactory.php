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
                'kode_jurusan' => 'RPL',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'kode_jurusan' => 'TKL',
                'nama_jurusan' => 'Tekstil'
            ],
            [
                'kode_jurusan' => 'KYU',
                'nama_jurusan' => 'Kayu'
            ],
            [
                'kode_jurusan' => 'KLT',
                'nama_jurusan' => 'Kulit'
            ],
            [
                'kode_jurusan' => 'LGM',
                'nama_jurusan' => 'Logam'
            ],
            [
                'kode_jurusan' => 'TKR',
                'nama_jurusan' => 'Teknik Kendaraan Ringan'
            ]
        ];
    }
}
