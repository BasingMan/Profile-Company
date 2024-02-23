<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminRoleId = Role::where('name', 'Admin')->value('id');
        //$userRoleId = Role::where('name', 'User')->value('id');

        $userData = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => $adminRoleId,
        ];

        User::create($userData);
    }
}
