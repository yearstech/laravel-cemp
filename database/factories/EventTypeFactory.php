<?php

namespace Database\Factories;

use App\Models\EventType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventType>
 */
class EventTypeFactory extends Factory
{
    protected $model = EventType::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Conference',
                'Workshop',
                'Seminar',
                'Meetup',
                'Webinar',
                'Hackathon'
            ]),
        ];
    }
}
