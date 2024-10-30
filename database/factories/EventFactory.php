<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDate = (clone $startDate)->modify('+'.random_int(1, 7).' days');

        return [
            'event_name' => $this->faker->sentence(3),  // Generate a random event name
            'event_start_date' => $startDate->format('Y-m-d'),  // Format as date
            'event_end_date' => $endDate->format('Y-m-d'),  // Format as date
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
