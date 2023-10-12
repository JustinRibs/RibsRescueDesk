<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentences(1, true),
            'description' => fake()->sentences(3, true),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            // 'assigned_to' => rand(1, User::count()),
            'assigned_to' => null,
            'user_id' => rand(1, User::count()),
            'category' => fake()->randomElement(['Account Management', 'Hardware', 'Photo/Video', 'Poster Request', 'Resources', 'Server', 'Voicemail', 'Website', 'WiFi', 'Printing']),
        ];
    }
}
