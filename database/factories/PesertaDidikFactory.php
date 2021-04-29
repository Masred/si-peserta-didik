<?php

namespace Database\Factories;

use App\Models\PesertaDidik;
use App\Models\Rombel;
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
            'status' => $this->faker->randomElement(array('aktif')),
            'jenis_pendaftaran' => $this->faker->randomElement(array('Siswa baru', 'Pindahan', 'Kembali bersekolah')),
            'nama' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'jenis_kelamin' => $this->faker->randomElement(array('L', 'P')),
            'nipd' => $this->faker->numberBetween(26773, 934512),
            'nisn' => $this->faker->numberBetween(6773, 97732),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-15 years'),
            'nik' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'no_kk' => $this->faker->numberBetween(3274839283748574, 3299999999999999),
            'agama' => 'Islam',
            'alamat' => $this->faker->streetAddress,
            'rt' => $this->faker->randomDigit,
            'rw' => $this->faker->randomDigit,
            'kelurahan' => 'Panyingkiran',
            'kecamatan' => 'Indihiang',
            'kode_pos' => $this->faker->postcode,
            'hp' => '08' . $this->faker->numberBetween(5676789472, 9676789472),
            'email' => $this->faker->email,
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
            'sekolah_asal' => 'SMP Negeri ' . $this->faker->randomDigit . ' ' . $this->faker->city,
            'kode_rombel' => $this->faker->randomElement(array('X-DKV-1', 'X-DKV-2','X-DKV-3', 'X-KULIT-1', 'X-KULIT-2', 'X-KULIT-3', 'XI-DKV-1', 'XI-DKV-2', 'XI-DKV-3', 'XI-KULIT-1', 'XI-KULIT-2', 'XI-KULIT-3', 'XII-DKV-1', 'XII-DKV-2', 'XII-DKV-3', 'XII-KULIT-1', 'XII-KULIT-2', 'XII-KULIT-3'))
        ];
    }
}
