<?php

namespace Database\Factories;

use App\Models\Rout;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rout>
 */
class RoutFactory extends Factory
{

    protected $model = Rout::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->country()
        ];
    }
}
