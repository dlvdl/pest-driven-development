<?php

use App\Models\Course;
use App\Models\Video;

use function Pest\Laravel\get;

it('does not find unreleased course', function () {
    $unreleasedCourse = Course::factory()->create();

    get(route('pages.course-details', $unreleasedCourse))
        ->assertNotFound();
});

it('show course details', function () {
    $course = Course::factory()->released()->create();

    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSeeText([
            $course->title,
            $course->description,
            $course->tagline,
            ...$course->learnings,
        ])
        ->assertSee(asset("images/$course->image_name"));
});

it('shows course video count', function () {
    $course = Course::factory()
        ->released()
        ->has(Video::factory()->count(3))
        ->create();

    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});

it('includes paddle checkout button', function () {
    config()->set('services.paddle.client_side_token', 'vendor-id');

    $course = Course::factory()
        ->released()
        ->has(Video::factory()->count(3))
        ->create([
            'paddle_price_id' => 'product-price-id'
        ]);

    get(route('pages.course-details', $course))
        ->assertOk()
        ->assertSee('<script src="https://cdn.paddle.com/paddle/v2/paddle.js"></script>', false)
        ->assertSee('Paddle.Environment.set("sandbox");', false)
        ->assertSee('Paddle.Initialize({token: "vendor-id"});', false)
        ->assertSee('paddle_button', false)
        ->assertSee($course->paddle_price_id);
});
