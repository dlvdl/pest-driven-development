<?php

use App\Livewire\VideoPlayer;

beforeEach(function () {
    $this->loggedInUser = loginAsUser();
});

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
    $course = createCourseAndVideos(3);

    $videos = $course->videos;
    $videosTitles = $videos->pluck('title')->toArray();
    Livewire::test(VideoPlayer::class, ['video' => $videos[0]])
        ->assertSee($videosTitles)
        ->assertSeeHtml([
            route('page.course-videos', ['course' => $course, 'video' => $videos[1]]),
            route('page.course-videos', ['course' => $course, 'video' => $videos[2]]),
        ]);
});

test('does not include route for current video', function () {
    $course = createCourseAndVideos(3);

    $videos = $course->videos;
    $videosTitles = $videos->pluck('title')->toArray();

    Livewire::test(VideoPlayer::class, ['video' => $videos[0]])
        ->assertSee($videosTitles)
        ->assertDontSeeHtml([
            '<a href="'.route('page.course-videos', ['course' => $course, 'video' => $videos[0]]).'"',
        ]);
});

test('mark video as completed', function () {
    $course = createCourseAndVideos();

    $this->loggedInUser->purchasedCourses()->attach($course);

    expect($this->loggedInUser->watchedVideos)->toHaveCount(0);

    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->assertMethodWired('markVideoAsCompleted')
        ->call('markVideoAsCompleted')
        ->assertMethodNotWired('markVideoAsCompleted')
        ->assertMethodWired('markVideoAsNotCompleted');

    $this->loggedInUser->refresh();
    expect($this->loggedInUser->watchedVideos)
        ->toHaveCount(1)
        ->first()->title->toEqual($course->videos()->first()->title);
});

test('marks video as not completed', function () {
    $course = createCourseAndVideos();

    $this->loggedInUser->purchasedCourses()->attach($course);
    $this->loggedInUser->watchedVideos()->attach($course->videos()->first());

    expect($this->loggedInUser->watchedVideos)->toHaveCount(1);

    Livewire::test(VideoPlayer::class, ['video' => $course->videos()->first()])
        ->assertMethodWired('markVideoAsNotCompleted')
        ->call('markVideoAsNotCompleted')
        ->assertMethodNotWired('markVideoAsNotCompleted')
        ->assertMethodWired('markVideoAsCompleted');

    $this->loggedInUser->refresh();
    expect($this->loggedInUser->watchedVideos)
        ->toHaveCount(0);
});
