<?php

use App\Livewire\VideoPlayer;
use App\Models\User;

test('show details for given video', function () {
    $course = createCourseAndVideos();

    $video = $course->videos->first();
    Livewire::test(VideoPlayer::class, ['video' => $video])
        ->assertSeeText([
            $video->title,
            $video->description,
            "{$video->duration_in_min}min",
        ]);
});

test('shows given video', function () {
    $course = createCourseAndVideos();

    $video = $course->videos->first();
    Livewire::test(VideoPlayer::class, ['video' => $video])
        ->assertSeeHtml('src="https://player.vimeo.com/video/'.$video->vimeo_id.'"');
});

test('shows list of all course videos', function () {
    $course = createCourseAndVideos(10);

    $videos = $course->videos;
    $firstVideo = $videos->first();
    $videosTitles = $videos->pluck('title')->toArray();
    $videosLinks = $videos->reduce(function ($carry, $video) use ($course) {
        $carry[] = route('page.course-videos', $course, $video);

        return $carry;
    }, []);

    Livewire::test(VideoPlayer::class, ['video' => $firstVideo])
        ->assertSee($videosTitles)
        ->assertSeeHtml($videosLinks);
});

test('mark video as completed', function () {
    $user = User::factory()->create();
    $course = createCourseAndVideos();

    $user->purchasedCourses()->attach($course);

    expect($user->watchedVideos)->toHaveCount(0);

    loginAsUser($user);
    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->call('markVideoAsCompleted');

    $user->refresh();
    expect($user->watchedVideos)
        ->toHaveCount(1)
        ->first()->title->toEqual($course->videos()->first()->title);
});

test('marks video as not completed', function () {
    $user = User::factory()->create();
    $course = createCourseAndVideos();

    $user->purchasedCourses()->attach($course);
    $user->watchedVideos()->attach($course->videos()->first());

    expect($user->watchedVideos)->toHaveCount(1);

    loginAsUser($user);
    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->call('markVideoAsNotCompleted');

    $user->refresh();
    expect($user->watchedVideos)
        ->toHaveCount(0);
});
