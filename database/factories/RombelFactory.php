<?php

namespace Database\Factories;

use App\Models\Rombel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RombelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rombel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_rombel' => $this->faker->randomElement(array('X', 'XI', 'XII')) . ' ' . $this->faker->randomElement(array('DKV', 'KLT', 'KYU', 'LGM', 'RPL', 'TKL', 'TKR')) . ' ' . $this->faker->randomElement(array(1, 2, 3, 4, 5)),
            'kelas' => $this->faker->randomElement(array('X', 'XI', 'XII')),
            'kode_jurusan' => $this->faker->randomElement(array('DKV', 'KLT', 'KYU', 'LGM', 'RPL', 'TKL', 'TKR')),
            'kelompok' => $this->faker->randomElement(array(1, 2, 3, 4, 5))
        ];
    }
}
