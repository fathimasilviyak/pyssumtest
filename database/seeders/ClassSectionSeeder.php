<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ClassSection;

class ClassSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $classSections = [
            [
            'name' => NULL,
            'description' => 'Early Intervention Class',
            'faculty_id' => NULL,
            'student_class_id' => 1,
            ],
            [
                'name' => NULL,
                'description' => 'PCDC Class1',
                'faculty_id' => NULL,
                'student_class_id' => 2,
            ],
            [
                'name' => NULL,
                'description' => 'PCDC Class2',
                'faculty_id' => NULL,
                'student_class_id' => 3,
            ],
            [
                'name' => NULL,
                'description' => 'PCDC Class3',
                'faculty_id' => NULL,
                'student_class_id' => 4,
            ],
            [
                'name' => NULL,
                'description' => 'PCDC Class4',
                'faculty_id' => NULL,
                'student_class_id' => 5,
            ],
            [
                'name' => NULL,
                'description' => 'PCDC Class5',
                'faculty_id' => NULL,
                'student_class_id' => 6,
            ],
            [
                'name' => NULL,
                'description' => 'Inclusive Education Class1',
                'faculty_id' => NULL,
                'student_class_id' => 7,
            ],
            [
                'name' => NULL,
                'description' => 'Inclusive Education Class2',
                'faculty_id' => NULL,
                'student_class_id' => 8,
            ],
            [
                'name' => NULL,
                'description' => 'Inclusive Education Class3',
                'faculty_id' => NULL,
                'student_class_id' => 9,
            ],
            [
                'name' => NULL,
                'description' => 'Inclusive Education Class4',
                'faculty_id' => NULL,
                'student_class_id' => 10,
            ],
            [
                'name' => NULL,
                'description' => 'Inclusive Education Class5',
                'faculty_id' => NULL,
                'student_class_id' => 11,
            ],
            [
                'name' => 'SEM1',
                'description' => 'PRTC  SEMESTER1',
                'faculty_id' => NULL,
                'student_class_id' => 12,
            ],
            [
                'name' => 'SEM2',
                'description' => 'PRTC  SEMESTER2',
                'faculty_id' => NULL,
                'student_class_id' => 12,
            ],
            [
                'name' => 'SEM3',
                'description' => 'PRTC  SEMESTER3',
                'faculty_id' => NULL,
                'student_class_id' => 12,
            ],
            [
                'name' => 'SEM4',
                'description' => 'PRTC  SEMESTER4',
                'faculty_id' => NULL,
                'student_class_id' => 12,
            ]
         
    ];
    foreach($classSections as $classSection){
        ClassSection::create($classSection);
    }  

    }
}
