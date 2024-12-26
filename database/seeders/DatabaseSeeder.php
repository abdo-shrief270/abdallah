<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Gov;
use App\Models\Order;
use App\Models\Owner;
use App\Models\Product;
use App\Models\Rout;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Artisan::call('migrate:fresh');
        Owner::factory()->create([
            'name' => 'Abdallah Ayman',
            'phone' => '01115716930',
            'password' => bcrypt('12345678')
        ]);
        Owner::factory()->create([
            'name' => 'Abdelrahman Shrief',
            'phone' => '01270989676',
            'password' => bcrypt('2510885891')
        ]);
        Rout::factory(5)->create();
        User::factory()->create([
            'name' => 'User Example',
            'phone' => '01234567890',
            'id_number' => '30302022402727',
            'password' => bcrypt('12345678'),
            'active' => true,
            'rout_id' => Rout::inRandomOrder()->first()->id,
        ]);
        Gov::factory(20)->create();
        City::factory(80)->create();
        User::factory(20)->create();
        Product::factory(10)->create();
        Order::factory(1000)->create();
    }
}
