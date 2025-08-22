<?php

use App\Models\Course;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

it('shows courses overview', function () {
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    get(route('pages.home'))
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

    get(route('pages.home'))
        ->assertSeeText([
            $releasedCourse->title,
            $releasedCourse->description,
        ])
        ->assertDontSeeText([
            $notReleasedCourse->title,
        ]);
});

it('shows courses by release date', function () {
    $releasedCourse = Course::factory()->released(Carbon::yesterday())->create();
    $newlyReleasedCourse = Course::factory()->released(Carbon::now())->create();

    get(route('pages.home'))
        ->assertSeeTextInOrder([
            $newlyReleasedCourse->title,
            $releasedCourse->title,
        ]);
});

it('shows links to courses', function () {
    $firstCourse = Course::factory()->released()->create();
    $secondCourse = Course::factory()->released()->create();
    $lastCourse = Course::factory()->released()->create();

    get(route('pages.home'))
        ->assertSeeHtml([
            route('pages.course-details', $firstCourse),
            route('pages.course-details', $secondCourse),
            route('pages.course-details', $lastCourse),
        ]);
});

it('includes login if not logged in', function () {
    get(route('pages.home'))
        ->assertOk()
        ->assertSeeText([
            'Login',
        ])
        ->assertDontSeeText([
            'Log out',
        ])
        ->assertSee(route('login'));
});

it('includes logout if logged in', function () {
    loginAsUser();

    get(route('pages.home'))
        ->assertOk()
        ->assertSeeText([
            'Log out',
        ])
        ->assertDontSeeText([
            'Log in',
        ])
        ->assertSee(route('logout'));
});
