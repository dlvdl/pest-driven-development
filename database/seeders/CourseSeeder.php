<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        if ($this->isAlreadySeeded()) {
            return;
        }

        Course::create([
            'title' => 'Laravel Course For Beginners',
            'paddle_product_id' => 'pro_01k3jy17dtes1vk19febn0qa7h',
            'slug' => Str::slug('Laravel Course For Beginners'),
            'tagline' => 'Learn Laravel step by step from scratch',
            'description' => 'This beginner-friendly course introduces you to the Laravel PHP framework. You will learn how to set up a project, work with routing, controllers, views, models, migrations, and build your first Laravel application.',
            'learnings' => [
                'Understand MVC architecture',
                'Work with routes, controllers, and views',
                'Set up databases and run migrations',
                'Build CRUD functionality',
                'Deploy a Laravel application',
            ],
            'image_name' => 'laravel-beginners.jpg',
            'released_at' => now(),
        ]);

        Course::create([
            'title' => 'Advanced Laravel',
            'paddle_product_id' => 'pro_01k3jyb87v32ht13jdma6j63nz',
            'slug' => Str::slug('Advanced Laravel'),
            'tagline' => 'Master advanced concepts and techniques in Laravel',
            'description' => 'This course is for developers who already know the basics of Laravel. You will dive deep into service containers, events, queues, caching, testing, API development, and performance optimization.',
            'learnings' => [
                'Work with service container & service providers',
                'Implement event-driven architecture',
                'Use queues and jobs for background processing',
                'Optimize performance and caching',
                'Build and document REST APIs',
            ],
            'image_name' => 'advanced-laravel.jpg',
            'released_at' => now()->subMonths(3),
        ]);

        Course::create([
            'title' => 'TDD The Laravel Way',
            'paddle_product_id' => 'pro_01k3jydbjn3t3kayz3jfpcdaen',
            'slug' => Str::slug('TDD The Laravel Way'),
            'tagline' => 'Build Laravel applications using Test Driven Development',
            'description' => 'This course teaches you how to apply Test Driven Development (TDD) in Laravel. You will write tests first, then build features step by step, ensuring high-quality and maintainable code.',
            'learnings' => [
                'Understand PHPUnit and Pest in Laravel',
                'Write unit and feature tests',
                'Practice red-green-refactor cycle',
                'Test drive CRUD applications',
                'Develop confidence in refactoring',
            ],
            'image_name' => 'tdd-laravel.jpg',
            'released_at' => now()->subMonths(6),
        ]);
    }

    private function isAlreadySeeded(): bool
    {
        $result = Course::whereIn(
            'title',
            ['Laravel Course For Beginners', 'Advanced Laravel', 'TDD The Laravel Way']
        )->get();

        return $result->isNotEmpty();
    }
}
