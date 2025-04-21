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
        $eventTypes = EventType::factory()->count(5)->create();
        $users = User::factory()->count(3)->create();
        Event::factory()->count(10)->create([
            'event_type_id' => $eventTypes->random()->id,
            'host_user_id' => $users->random()->id,
        ]);
    }
}
