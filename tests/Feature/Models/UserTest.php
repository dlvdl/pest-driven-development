<?php

use App\Models\Course;
use App\Models\User;
use App\Models\Video;

it('has courses', function () {
    $user = User::factory()
        ->has(Course::factory()->count(3), 'purchasedCourses')
        ->create();

    expect($user->purchasedCourses)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Course::class);
});

it('has videos', function () {
    $user = User::factory()
        ->has(Video::factory()->count(3), 'watchedVideos')
        ->create();

    expect($user->watchedVideos)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Video::class);
});
