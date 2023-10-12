<?php

namespace Database\Seeders;

use App\Models\lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        lesson::factory()->count(100)->create();
    }
}
