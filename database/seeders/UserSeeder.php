<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Ensure the "admin" role exists
         $adminRole = Role::firstOrCreate(['name' => 'admin']);

         $adminUser = User::firstOrCreate(
             ['email' => 'admin@admin.com'],
             [
                 'name' => 'Admin',
                 'password' => bcrypt('password'),
             ]
         );
 
         // Assign the role to the user
         $adminUser->assignRole($adminRole);
    }
}
