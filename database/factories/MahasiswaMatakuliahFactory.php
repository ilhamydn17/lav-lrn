<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MahasiswaMatakuliah>
 */
class MahasiswaMatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mahasiswa_id' => $this->faker->numberBetween(1, 4),
            'matakuliah_id' => $this->faker->numberBetween(1, 4),
            'nilai'=> $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
        ];
    }
}
