<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\User;
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
        ->assertSeeHtml('src="https://player.vimeo.com/video/'.$video->vimeo_id.'"');
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
                    'video' => Video::where('title', 'first video')->first(),
                ]
            ),
            route(
                'page.course-videos',
                [
                    'course' => $course,
                    'video' => Video::where('title', 'second video')->first(),
                ]
            ),
            route(
                'page.course-videos',
                [
                    'course' => $course,
                    'video' => Video::where('title', 'third video')->first(),
                ]
            ),
        ]);
});

test('mark video as completed', function () {
    $user = User::factory()->create();
    $course = Course::factory()
        ->has(Video::factory()->state(['title' => 'first video']))
        ->create();

    $user->courses()->attach($course);

    expect($user->videos)->toHaveCount(0);

    loginAsUser($user);
    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->call('markVideoAsCompleted');

    $user->refresh();
    expect($user->videos)
        ->toHaveCount(1)
        ->first()->title->toEqual('first video');
});

test('marks video as not completed', function () {
    $user = User::factory()->create();
    $course = Course::factory()
        ->has(Video::factory()->state(['title' => 'first video']))
        ->create();

    $user->courses()->attach($course);
    $user->videos()->attach($course->videos()->first());

    expect($user->videos)->toHaveCount(1);

    loginAsUser($user);
    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->call('markVideoAsNotCompleted');

    $user->refresh();
    expect($user->videos)
        ->toHaveCount(0);
});
