<?php

namespace Database\Factories;

use App\Models\PesertaDidik;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaDidikFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PesertaDidik::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker = \Faker\Factory::create('id_ID');
        return [
            'status' => $this->faker->randomElement(array('aktif', 'pindah', 'tamat', 'pindahan', 'keluar', 'dikeluarkan')),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(array('L', 'P')),
            'nipd' => $this->faker->numberBetween(26773, 934512),
            'nisn' => $this->faker->numberBetween(6773, 97732),
            'tahun_masuk' => $this->faker->numberBetween(2010, 2021),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date(),
            'nik' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'no_kk' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'agama' => 'Islam',
            'alamat' => $this->faker->streetAddress,
            'kelurahan' => 'Panyingkiran',
            'kecamatan' => 'Indihiang',
            'kota' => $this->faker->city,
            'hp' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'tahun_keluar' => $this->faker->numberBetween(2010, 2021),
            'nama_ayah' => $this->faker->name('male'),
            'tahun_lahir_ayah' => $this->faker->numberBetween(1950, 1999),
            'jenjang_pendidikan_ayah' => $this->faker->randomElement(array('SMA Sederajat', 'SMP Sederajat', 'D4/S1', 'S2', 'S3')),
            'pekerjaan_ayah' => $this->faker->randomElement(array('Petani', 'Peternak', 'PNS/TNI/POLRI', 'Wirausaha', 'Wiraswasta')),
            'penghasilan_ayah' => $this->faker->randomElement(array('Rp. 500.000 - 999.9999', 'Rp. 2 juta - 4.999.999 ', 'Rp. 5 juta - 20 juta')),
            'nik_ayah' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'nama_ibu' => $this->faker->name('female'),
            'tahun_lahir_ibu' => $this->faker->numberBetween(1950, 1999),
            'jenjang_pendidikan_ibu' => $this->faker->randomElement(array('SMA Sederajat', 'SMP Sederajat', 'D4/S1', 'S2', 'S3')),
            'pekerjaan_ibu' => $this->faker->randomElement(array('Petani', 'Peternak', 'PNS/TNI/POLRI', 'Wirausaha', 'Wiraswasta')),
            'penghasilan_ibu' => $this->faker->randomElement(array('Rp. 500.000 - 999.9999', 'Rp. 2 juta - 4.999.999 ', 'Rp. 5 juta - 20 juta')),
            'nik_ibu' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'nama_wali' => $this->faker->name('male'),
            'tahun_lahir_wali' => $this->faker->numberBetween(1950, 1999),
            'jenjang_pendidikan_wali' => $this->faker->randomElement(array('SMA Sederajat', 'SMP Sederajat', 'D4/S1', 'S2', 'S3')),
            'pekerjaan_wali' => $this->faker->randomElement(array('Petani', 'Peternak', 'PNS/TNI/POLRI', 'Wirausaha', 'Wiraswasta')),
            'penghasilan_wali' => $this->faker->randomElement(array('Rp. 500.000 - 999.9999', 'Rp. 2 juta - 4.999.999 ', 'Rp. 5 juta - 20 juta')),
            'nik_wali' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'rombel_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
