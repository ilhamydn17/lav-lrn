<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable()->onDelete('cascade');
            $table->string('todo')->nullable();
            $table->string('label')->nullable();
            $table->boolean('done')->nullable();
            $table->timestamps();
        */
        return [
            // make factory todo
            'user_id'=> $this->faker->numberBetween(1,10),
            'todo'=> $this->faker->sentence(3),
            'label'=> $this->faker->word(),
            'done'=> $this->faker->boolean()
        ];
    }
}
