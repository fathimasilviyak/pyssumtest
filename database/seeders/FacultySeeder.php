<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            // 'dob' => '',
            // 'gender' => '',
            // 'aadhar' => '',
            // 'guardian' => '',
            // 'qualification' => '',
            // 'date_appoinment' => '',
            // 'designation' => '',
            // 'nature_appoinment' => '',
            // 'specialized_in' => '',
            // 'pan' => '',
            // 'mobile' => '',
            // 'permenent_address' => '',
            // 'local_address' => '',
            // 'date_leaving' => '',
            'photo' => 'default.jpg',
            'user_id' => 1,

        ]);
    }
}
