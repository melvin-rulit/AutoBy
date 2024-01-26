<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proxi>
 */
class ProxiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'delegate_id' => 1,
            'owner_id' => 1,
            'number' => fake()->numerify,
            'valid_until' => fake()->date(),
            'issued_by' => fake()->userName(),
            'issued_date' => fake()->date(),
            'issued_number' => fake()->numerify
        ];
    }
}
