<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\StudentClass;

class StudentClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $studentClasses = [
            [
            'name' => 'EI',
            'type' => 'EI',
            'branch_id' => 1,
            ],
            [
            'name' => 'Pre-Primary',
            'type' => 'special_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'Primary1',
            'type' => 'special_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'Primary2',
            'type' => 'special_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'Secondary',
            'type' => 'special_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'Pre-Vocational',
            'type' => 'special_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'INCEDU1',
            'type' => 'inclusive_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'INCEDU2',
            'type' => 'inclusive_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'INCEDU3',
            'type' => 'inclusive_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'INCEDU4',
            'type' => 'inclusive_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'INCEDU5',
            'type' => 'inclusive_student',
            'branch_id' => 1,
            ],
            [
            'name' => 'D.edSE',
            'type' => 'training_student',
            'branch_id' => 1,
            ],
    ];
    foreach($studentClasses as $studentClass){
        StudentClass::create($studentClass);
    }    
      
    }
}
