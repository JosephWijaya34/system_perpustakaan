<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role' => "admin", // admin
            ],
            [
                'role' => "member", // member
            ],
        ];

        //insert data
        foreach ($data as $role) {
            Role::create($role);
        }
    }
}
