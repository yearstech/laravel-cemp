<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventType;
use App\Models\User;
use Hamcrest\Core\Set;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
        ]);
        // create regular users with same password
        $users = User::factory()->count(3)->create([
            'password' => bcrypt('12345'),
        ]);
        foreach ($users as $user) {
            $user->assignRole('user');
        }

        // create event types
        $eventTypes = EventType::factory()->count(5)->create();

        // create events
        Event::factory()->count(10)->create([
            'event_type_id' => $eventTypes->random()->id,
            'host_user_id' => $users->random()->id,
        ]);
    }
}
