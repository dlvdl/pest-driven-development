<?php

use App\Livewire\VideoPlayer;
use App\Models\Course;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;

use function Pest\Laravel\get;

it('cannot be accessed with guest', function () {
    $course = Course::factory()->create();

    get(route('page.course-videos', $course))
        ->assertRedirect(route('login'));
});

it('includes video player', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    loginAsUser();
    get(route('page.course-videos', $course))
        ->assertOk()
        ->assertSeeLivewire(VideoPlayer::class);
});

it('shows first course video by default', function () {
    $course = Course::factory()
        ->has(Video::factory())
        ->create();

    loginAsUser();
    $video = $course->videos()->first();
    get(route('page.course-videos', $course))
        ->assertOk()
        ->assertSeeText($video->title);
});

it('shows provided course video', function () {
    $course = Course::factory()
        ->has(Video::factory()->count(3))
        ->create();

    loginAsUser();
    $video = $course->videos()->orderByDesc('id')->first();
    get(route('page.course-videos', [
        'course' => $course,
        'video' => $video,
    ]))
        ->assertOk()
        ->assertSeeText($video->title);
});
