<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Admin', 'code' => 'ADM' ],
            ['name' => 'User', 'code' => 'USER'],
        ];

            foreach ($roles as $role) {
                DB::table('roles')->insert($role);
        }
    }
}