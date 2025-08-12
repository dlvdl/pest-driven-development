<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('show course details', function () {
    $course = Course::factory()->create([
        'tagline' => 'Course tagline',
        'image' => 'image.jpg',
        'learnings' => [
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
        ],
    ]);

    get(route('course.details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            'Course tagline',
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
        ])
        ->assertSee([
            'image.jpg',
        ]);
});

it('shows course video count', function () {
    $course = Course::factory()->create();
    Video::factory(3)->create(['course_id' => $course->id]);

    get(route('course.details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});
