<?php

use App\Models\Course;
use App\Models\Video;

test('gives back readable video duration', function () {
    $video = Video::factory()->create(['duration_in_min' => 10]);

    expect($video->getReadableDuration())->toEqual('10min');
});

test('gives back video course', function () {
    $course = createCourseAndVideos();

    $video = $course->videos()->first();

    expect($video->course)->toBeInstanceOf(Course::class);
});

test('tells if current user has not yet watched a given video', function () {
    $video = Video::factory()->create();

    loginAsUser();

    expect($video->alreadyWatchedByCurrentUser())
        ->toBeFalse();
});

test('tells if current user has already watched a given video', function () {
    $video = Video::factory()->create();

    $user = loginAsUser();
    $user->watchedVideos()->attach($video);

    expect($video->alreadyWatchedByCurrentUser())
        ->toBeTrue();
});
