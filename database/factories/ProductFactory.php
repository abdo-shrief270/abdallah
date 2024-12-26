<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $netPrice = $this->faker->randomFloat(0, 10, 1000); // Generate random net price between 10 and 1000
        $discount = $this->faker->randomFloat(0, 0, 100);  // Discount between 0 and 50% (0.5 means 50%)
        $price = $netPrice * (1 - $discount/100); // Calculate price after discount

        return [
            'name' => $this->faker->word . ' ' . $this->faker->word, // Random product name
            'code' => strtoupper($this->faker->lexify('???-#####')), // Random product code (e.g., ABC-12345)
            'net_price' => $netPrice, // Random net price
            'discount' => $discount, // Discount as a percentage
            'price' => $price, // Price after discount
            'available_quantity' => $this->faker->numberBetween(0, 100), // Random available quantity
        ];
    }
}
