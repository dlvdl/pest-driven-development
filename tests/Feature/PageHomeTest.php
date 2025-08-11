<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows courses overview', function () {
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    get(route('home'))
        ->assertSeeText([
            $firstCourse->title,
            $firstCourse->description,
            $secondCourse->title,
            $secondCourse->description,
            $lastCourse->title,
            $lastCourse->description,
        ]);
});

it('shows only released courses', function () {
    $releasedCourse = Course::factory()->released()->create();
    $notReleasedCourse = Course::factory()->create();

    get(route('home'))
        ->assertSeeText([
            $releasedCourse->title,
            $releasedCourse->description,
        ])
        ->assertDontSeeText([
            $notReleasedCourse->title,
        ])
    ;
});

it('shows courses by release date', function () {
    $releasedCourse =  Course::factory()->released(Carbon::yesterday())->create();
    $newlyReleasedCourse = Course::factory()->released(Carbon::now())->create();

    get(route('home'))
        ->assertSeeTextInOrder([
            $newlyReleasedCourse->title,
            $releasedCourse->title,
        ]);
});