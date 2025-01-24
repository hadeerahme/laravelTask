<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Track;
use Illuminate\Database\Seeder;

class TracksTableSeeder extends Seeder
{
    public function run()
    {
        Track::create(['name' => 'Web Development', 'description' => 'Learn web development']);
        Track::create(['name' => 'Data Science', 'description' => 'Learn data science']);
        Track::create(['name' => 'Mobile Development', 'description' => 'Build mobile apps']);
        Track::create(['name' => 'DevOps', 'description' => 'Learn DevOps practices']);
    }
}

