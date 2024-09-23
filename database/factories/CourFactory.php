<?php

namespace Database\Factories;

use App\Models\Branche;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cour>
 */
class CourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'intitule' => $this->faker->unique()->word,
           'branch_id' => Branche::inRandomOrder()->first()->id,

        ];
    }
}
