<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clients>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->userName(),
            'middle_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birthday' => fake()->date(),
            'email' => fake()->unique()->email(),
            'passport_series' => fake()->name(),
            'passport_number' => fake()->imei(),
            'passport_notes' => fake()->imei(),
            'registration_address' => fake()->address(),
            'residence_address' => fake()->imei(),
            'resident_card' => fake()->numerify(),
            'personnel_number' => fake()->numerify(),
            'phone_number' => fake()->phoneNumber(),
            'comment' => fake()->text(60),
            'branch_id' => 14,
        ];
    }
}
