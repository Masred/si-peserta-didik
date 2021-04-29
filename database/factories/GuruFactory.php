<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name,
            'nik' => $this->faker->numberBetween('3286986879', '329345345346'),
            'nip' => $this->faker->numberBetween('86986879', '9345345346'),
            'keterangan' => 'Wali Kelas',
            'jenis_kelamin' => $this->faker->randomElement(array('L', 'P')),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-20 years'),
            'agama' => 'Islam',
            'alamat' => $this->faker->streetAddress,
            'rt' => '01',
            'rw' => '12',
            'kelurahan' => 'tamanjaya',
            'kecamatan' => 'tamansasri',
            'kode_pos' => 47683,
        ];
    }
}
