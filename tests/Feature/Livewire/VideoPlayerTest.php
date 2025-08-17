<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;

test('show details for given video', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    Livewire::test(VideoPlayer::class, ['video' => $course->videos->first()])
        ->assertSeeText([
            $course->videos->first()->title,
            $course->videos->first()->description,
            $course->videos->first()->duration.'min',
        ]);
});

test('shows video', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    Livewire::test(VideoPlayer::class, ['video' => $course->videos->first()])
        ->assertSee(
            '<iframe src="https://player.vimeo.com/video/'.$course->videos->first()->vimeo_id,
            false
        );
});
