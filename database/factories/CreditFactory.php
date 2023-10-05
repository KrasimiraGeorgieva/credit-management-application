<?php

namespace Database\Factories;

use App\Models\Recipient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credit>
 */
class CreditFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipient_id' => Recipient::factory()->create()->id,
            'amount' => $this->faker->randomFloat(2, 1000, 100000),
            'term_months' => $this->faker->numberBetween(3, 120),
            'interest_rate' => 7.9,
        ];
    }
}
