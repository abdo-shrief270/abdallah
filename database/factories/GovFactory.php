<?php

namespace Database\Factories;

use App\Models\Rout;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gov>
 */
class GovFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
            'rout_id' => Rout::inRandomOrder()->first()->id,
        ];
    }
}
