<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Track;
use App\Models\Course;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
     
        $track1 = Track::create(['name' => 'Web Development', 'description' => 'Learn web development']);
        $track2 = Track::create(['name' => 'Data Science', 'description' => 'Learn data science']);

       
        $course1 = Course::create([
            'name' => 'Laravel Basics',
            'description' => 'Introduction to Laravel',
            'track_id' => $track1->id,
        ]);
        $course2 = Course::create([
            'name' => 'Python for Data Science',
            'description' => 'Python programming for data science',
            'track_id' => $track2->id,
        ]);

   
        $student1 = Student::create(['name' => 'usif', 'email' => 'usif@12.com', 'track_id' => $track1->id]);
        $student2 = Student::create(['name' => 'asma', 'email' => 'asma@12.com', 'track_id' => $track2->id]);

    
        $student1->courses()->attach([$course1->id]);
        $student2->courses()->attach([$course2->id]);
    }
}