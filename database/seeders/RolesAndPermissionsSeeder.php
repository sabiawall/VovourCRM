<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);

        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'manage-blogs']);

        // Assign permissions to Admin
        $adminRole->givePermissionTo(['create-users', 'edit-users', 'delete-users', 'manage-blogs']);
        
        // Assign permissions to Editor
        $editorRole->givePermissionTo('manage-blogs');

        $user1 = User::find(1);
        if (!$user1) {
            $user1 = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password123')
            ]);
        }
        $user1->assignRole('Admin');

        $user2 = User::find(2);
        if (!$user2) {
            $user2 = User::create([
                'name' => 'Editor',
                'email' => 'editor@gmail.com',
                'password' => bcrypt('password123')
            ]);
        }
        $user2->assignRole('Editor');
    }
}
