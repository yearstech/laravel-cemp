<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventType;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{

    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'event_type_id' => EventType::factory(),
            'details' => $this->faker->text(200),
            'start_datetime' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'end_datetime' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'venue' => $this->faker->address(),
            'banner' => $this->faker->imageUrl(640, 480, 'events', true), // Optional: fake image URL
            'host_user_id' => User::factory(), // assuming users table already exists
            'registration_fee' => $this->faker->randomFloat(2, 0, 500),
            'is_public' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
