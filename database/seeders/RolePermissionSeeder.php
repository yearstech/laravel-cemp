<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        $permissions = [
            'CRUD_Permission',
            'CRUD_Role',
            'CRUD_User',
            'User_List',
        ];
        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
        // create roles
        $roles = [
            'super-admin',
            'user',
        ];
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create(['name' => $role]);
        }

        // role has permissions
        $role = \Spatie\Permission\Models\Role::findByName('super-admin');
        $permissions = \Spatie\Permission\Models\Permission::all();
        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
