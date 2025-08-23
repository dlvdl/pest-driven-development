<?php

use App\Livewire\VideoPlayer;

use function Pest\Laravel\get;

it('cannot be accessed with guest', function () {
    $course = createCourseAndVideos();

    get(route('page.course-videos', $course))
        ->assertRedirect(route('login'));
});

it('includes video player', function () {
    $course = createCourseAndVideos(3);

    loginAsUser();
    get(route('page.course-videos', $course))
        ->assertOk()
        ->assertSeeLivewire(VideoPlayer::class);
});

it('shows first course video by default', function () {
    $course = createCourseAndVideos(3);

    loginAsUser();
    $video = $course->videos()->first();
    get(route('page.course-videos', $course))
        ->assertOk()
        ->assertSeeText($video->title);
});

it('shows provided course video', function () {
    $course = createCourseAndVideos(3);

    loginAsUser();
    $video = $course->videos()->orderByDesc('id')->first();
    get(route('page.course-videos', [
        'course' => $course,
        'video' => $video,
    ]))
        ->assertOk()
        ->assertSeeText($video->title);
});
