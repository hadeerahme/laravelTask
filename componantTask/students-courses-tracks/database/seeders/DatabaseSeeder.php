<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables to avoid duplicate entries
        DB::table('course_student')->truncate();
        DB::table('students')->truncate();
        DB::table('courses')->truncate();
        DB::table('tracks')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Run seeders
        $this->call([
            TracksTableSeeder::class,
            CoursesTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
    }
}