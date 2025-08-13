<?php

use App\Models\Course;

use function Pest\Laravel\get;

it('gives back successful response for home page', function () {
    get(route('home'))
        ->assertOk();
});

it('gives back successful response for course details page', function () {
    $course = Course::factory()
        ->released()
        ->create();

    get(route('course.details', $course))
        ->assertOk();
});
