<?php

namespace Database\Factories;

use App\Models\Daftar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Daftar>
 */
class DaftarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    // Ambil semua ID pasien dan poli, pastikan tidak kosong
    $idPasien = \App\Models\Pasien::pluck('id')->toArray();
    $idPoli = \App\Models\Poli::pluck('id')->toArray();

    // Tambahkan pengecekan
    if (empty($idPasien) || empty($idPoli)) {
        throw new \Exception("Poli or Pasien data is missing. Make sure both tables have data.");
    }

    return [
        'pasien_id' => $this->faker->randomElement($idPasien),
        'tanggal_daftar' => $this->faker->date(),
        'poli_id' => $this->faker->randomElement($idPoli),
        'keluhan' => $this->faker->sentence(),
        'diagnosis' => $this->faker->sentence(),
        'tindakan' => $this->faker->sentence(),
    ];
}

}
