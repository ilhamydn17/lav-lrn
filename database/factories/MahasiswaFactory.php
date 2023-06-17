<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->numerify('##########'),
            'nama' => $this->faker->name(),
            'kelas_id' => $this->faker->numberBetween(1, 9),
            'jurusan' => $this->faker->randomElement(['Teknik Informatika', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Sipil', 'Teknik Industri']),
            'no_handphone' => $this->faker->randomNumber(),
        ];
    }
}
