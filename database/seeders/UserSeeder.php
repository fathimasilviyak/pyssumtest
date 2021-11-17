<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'superadmin',
            'password' => bcrypt('superadmin'),
            'role' => 'super_admin',
            'status' => 1,
            'branch_id' => 1,
        ]);
    }
}
