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
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $permissions = [
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'assign permission roles',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view blogs',
            'create blogs',
            'edit blogs',
            'delete blogs',
            'view scholarships',
            'create scholarships',
            'edit scholarships',
            'delete scholarships',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        
        $adminRole->givePermissionTo($permissions);
    }
}
