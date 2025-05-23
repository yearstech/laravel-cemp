<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'title' => 'Organization Name',
                'slug' => 'organization_name',
                'value' => 'CEMP',
                'data_type' => 'text',
                'is_visible' => true,
            ]
        ]);
    }
}
