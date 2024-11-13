<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()
                ->unique()
                ->randomElement(['Poli Mata', 'Poli Umum', 'Poli Gigi', 'Poli Anak', 'Poli Jantung', 'Poli Saraf', 'Poli Kulit', 'Poli Bedah']),
            'biaya' => fake()->unique()->randomNumber(8),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
