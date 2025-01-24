<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Track;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $track = Track::first(); 
        Course::create([
            'name' => 'Laravel Basics',
            'description' => 'Introduction to Laravel',
            'track_id' => $track->id, 
        ]);

        Course::create([
            'name' => 'Python for Data Science',
            'description' => 'Python programming for data science',
            'track_id' => $track->id, 
        ]);

      
    }
}