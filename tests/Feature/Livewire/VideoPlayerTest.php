<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;

test('show details for given video', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    $video = $course->videos->first();
    Livewire::test(VideoPlayer::class, ['video' => $video])
        ->assertSeeText([
            $video->title,
            $video->description,
            "{$video->duration_in_min}min",
        ]);
});

test('shows given video', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    $video = $course->videos->first();
    Livewire::test(VideoPlayer::class, ['video' => $video])
        ->assertSeeHtml(
            '<iframe src="https://player.vimeo.com/video/'.$video->vimeo_id,
        );
});

test('shows list of all course videos', function () {
    $course = Course::factory()
        ->has(
            Video::factory()
                ->count(3)
                ->state(new Sequence(
                    ['title' => 'first video'],
                    ['title' => 'second video'],
                    ['title' => 'third video'],
                ))
        )
        ->create();

    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->assertSee([
            'first video',
            'second video',
            'third video',
        ])
        ->assertSeeHtml([
            route(
                'page.course-videos',
                [
                    'course' => $course,
                    'video' => Video::where('title', 'first video')->first()
                ]

            ),
            route(
                'page.course-videos',
                [
                    'course' => $course,
                    'video' => Video::where('title', 'second video')->first()
                ]
            ),
            route(
                'page.course-videos',
                [
                    'course' => $course,
                    'video' => Video::where('title', 'third video')->first()
                ]
            ),
        ]);
});