<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        // Random product and user selection
        $product = Product::inRandomOrder()->first();
        $user = User::where('active',1)->inRandomOrder()->first();
        $city = City::inRandomOrder()->first();
        // Random quantity between 1 and 10
        $quantity = $this->faker->numberBetween(1, 10);

        // Random discount between 0 and 20%
        $addDiscount = $this->faker->randomFloat(0, 0, 100);

        // Calculate total price based on product price, quantity, and discount
        $totalPrice =  (($product->price * $quantity) + $city->ship_cost) * (1-$addDiscount/100);

        return [
            'customer_name' => $this->faker->name, // Random customer name
            'customer_phone' => '+20' . $this->faker->numberBetween(100000000, 999999999), // Egyptian phone number
            'user_id' => $user->id, // Random user ID
            'product_id' => $product->id, // Random product ID
            'quantity' => $quantity, // Random quantity
            'add_discount' => $addDiscount, // Random discount
            'total_price' => $totalPrice, // Total price after discount
            'address' => $this->faker->address, // Random address
            'city_id' => $city->id, // Random city ID
            'status' => $this->faker->randomElement(['new', 'unFinished', 'finished','canceled']), // Random status
        ];
    }
}
