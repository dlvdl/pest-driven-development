<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    public function run(): void
    {
        if ($this->isAlreadySeeded()) {
            return;
        }

        $firstCourse = Course::where('title', 'Laravel Course For Beginners')->first();
        $secondCourse = Course::where('title', 'Advanced Laravel')->first();
        $thirdCourse = Course::where('title', 'TDD The Laravel Way')->first();

        Video::insert([
            [
                'course_id' => $firstCourse->id,
                'title' => 'Introduction to Laravel',
                'slug' => Str::slug('Introduction to Laravel'),
                'description' => 'Overview of the Laravel framework and what you will learn in this course.',
                'duration' => '00:08:35',
                'duration_in_min' => 9,
                'vimeo_id' => '111111111',
            ],
            [
                'course_id' => $firstCourse->id,
                'title' => 'Routing and Controllers',
                'slug' => Str::slug('Routing and Controllers'),
                'description' => 'Learn how to define routes and create controllers to handle requests.',
                'duration' => '00:15:20',
                'duration_in_min' => 15,
                'vimeo_id' => '111111112',
            ],
            [
                'course_id' => $firstCourse->id,
                'title' => 'Working with Blade Templates',
                'slug' => Str::slug('Working with Blade Templates'),
                'description' => 'Use Laravel Blade templating engine to build dynamic views.',
                'duration' => '00:12:50',
                'duration_in_min' => 13,
                'vimeo_id' => '111111113',
            ],
            [
                'course_id' => $secondCourse->id,
                'title' => 'Service Container Deep Dive',
                'slug' => Str::slug('Service Container Deep Dive'),
                'description' => 'Understand and use the Laravel service container for dependency injection.',
                'duration' => '00:20:05',
                'duration_in_min' => 20,
                'vimeo_id' => '222222221',
            ],
            [
                'course_id' => $secondCourse->id,
                'title' => 'Queues and Jobs',
                'slug' => Str::slug('Queues and Jobs'),
                'description' => 'Learn how to handle background tasks with queues and jobs.',
                'duration' => '00:18:40',
                'duration_in_min' => 19,
                'vimeo_id' => '222222222',
            ],
            [
                'course_id' => $secondCourse->id,
                'title' => 'API Development in Laravel',
                'slug' => Str::slug('API Development in Laravel'),
                'description' => 'Build and document APIs using Laravel resources and OpenAPI.',
                'duration' => '00:22:10',
                'duration_in_min' => 22,
                'vimeo_id' => '222222223',
            ],

            [
                'course_id' => $thirdCourse->id,
                'title' => 'Getting Started with TDD',
                'slug' => Str::slug('Getting Started with TDD'),
                'description' => 'Introduction to Test Driven Development (TDD) in Laravel.',
                'duration' => '00:10:45',
                'duration_in_min' => 11,
                'vimeo_id' => '333333331',
            ],
            [
                'course_id' => $thirdCourse->id,
                'title' => 'Building Features with Tests',
                'slug' => Str::slug('Building Features with Tests'),
                'description' => 'Learn how to drive application features by writing tests first.',
                'duration' => '00:19:30',
                'duration_in_min' => 20,
                'vimeo_id' => '333333332',
            ],
        ]);

    }

    private function isAlreadySeeded(): bool
    {
        $firstCourse = Course::where('title', 'Laravel Course For Beginners')->first();
        $secondCourse = Course::where('title', 'Advanced Laravel')->first();
        $thirdCourse = Course::where('title', 'TDD The Laravel Way')->first();

        return $firstCourse->videos()->count() === 3
            && $secondCourse->videos()->count() === 3
            && $thirdCourse->videos()->count() === 2;
    }
}
