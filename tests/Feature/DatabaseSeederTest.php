<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;
use function Pest\Laravel\artisan;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;

test('adds given courses', function () {
    assertDatabaseCount(Course::class, 0);

    artisan('db:seed');

    assertDatabaseCount(Course::class, 3);
    assertDatabaseHas(Course::class, ['title' => 'Laravel Course For Beginners']);
    assertDatabaseHas(Course::class, ['title' => 'Advanced Laravel']);
    assertDatabaseHas(Course::class, ['title' => 'TDD The Laravel Way']);
});

test('adds courses only once', function () {
    assertDatabaseCount(Course::class, 0);

    artisan('db:seed');
    artisan('db:seed');

    assertDatabaseCount(Course::class, 3);
});

test('adds given videos', function () {
    assertDatabaseCount(Video::class, 0);

    artisan('db:seed');

    $firstCourse = Course::where('title', 'Laravel Course For Beginners')->first();
    $secondCourse = Course::where('title', 'Advanced Laravel')->first();
    $thirdCourse = Course::where('title', 'TDD The Laravel Way')->first();

    assertDatabaseCount(Video::class, 8);

    expect($firstCourse)
        ->videos
        ->toHaveCount(3);

    expect($secondCourse)
        ->videos
        ->toHaveCount(3);

    expect($thirdCourse)
        ->videos
        ->toHaveCount(2);
});

test('adds videos only once', function () {
    assertDatabaseCount(Video::class, 0);

    artisan('db:seed');
    artisan('db:seed');

    assertDatabaseCount(Video::class, 8);
});

test('adds local user', function () {
    App::partialMock()->shouldReceive('environment')->andReturn('local');
    assertDatabaseCount(User::class, 0);

    artisan('db:seed');

    $user = User::where('email', 'test@test.com')->first();
    $firstCourse = Course::where('title', 'Laravel Course For Beginners')->first();
    $secondCourse = Course::where('title', 'Advanced Laravel')->first();

    $user->purchasedCourses()->attach([$firstCourse, $secondCourse]);

    assertDatabaseCount(User::class, 1);

    expect($user)
        ->purchasedCourses
        ->toHaveCount(2);
});

test('adds local user only once', function () {
    App::partialMock()->shouldReceive('environment')->andReturn('local');
    assertDatabaseCount(User::class, 0);

    artisan('db:seed');
    artisan('db:seed');

    assertDatabaseCount(User::class, 1);
});

test('does not add  local user to production', function () {
    App::partialMock()->shouldReceive('environment')->andReturn('production');
    assertDatabaseCount(User::class, 0);

    artisan('db:seed');

    assertDatabaseCount(User::class, 0);
});