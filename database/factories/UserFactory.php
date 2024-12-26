<?php

namespace Database\Factories;

use App\Models\Rout;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $idNumber = $this->generateEgyptianIdNumber(); // Generate the Egyptian ID number

        return [
            'name' => $this->faker->name('ar_SA'), // Generate a random Arabic name
            'phone' => '01' . $this->faker->numberBetween(100000000, 299999999), // Egyptian phone number
            'id_number' => $idNumber, // Set the ID number
            'password' => bcrypt($idNumber), // Set the password as the ID number (hashed)
            'active' => $this->faker->boolean(50), // 80% chance to be active (true/false)
            'rout_id' => Rout::inRandomOrder()->first()->id, // Pick a random existing rout_id
        ];
    }

    // Helper function to generate an Egyptian ID number
    public function generateEgyptianIdNumber()
    {
        // Generate a random birth date in YYYY-MM-DD format
        $year = $this->faker->numberBetween(00, 24); // Random birth year
        $month = str_pad($this->faker->numberBetween(1, 12), 2, '0', STR_PAD_LEFT); // Random month
        $day = str_pad($this->faker->numberBetween(1, 31), 2, '0', STR_PAD_LEFT); // Random day

        // Random governorate (1-27)
        $governorate = str_pad($this->faker->numberBetween(1, 27), 2, '0', STR_PAD_LEFT);

        // Gender: 1 for male, 2 for female (random selection)
        $gender = $this->faker->randomElement([1, 2]);

        // A random sequence number (4 digits)
        $sequence = str_pad($this->faker->numberBetween(1000, 9999), 4, '0', STR_PAD_LEFT);

        // Combine all parts into a 14-digit ID number
        return "3{$year}{$month}{$day}{$governorate}{$gender}{$sequence}";
    }

}
