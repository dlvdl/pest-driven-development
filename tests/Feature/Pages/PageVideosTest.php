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
        ->has(Video::factory()->state(['title' => 'My video']))
        ->create();

    loginAsUser();
    get(route('page.course-videos', $course))
        ->assertOk()
        ->assertSeeText(
            ['My video']
        );
});

it('shows provided course video', function () {
    $course = Course::factory()
        ->has(
            Video::factory()
                ->state(
                    new Sequence(
                        ['title' => 'My first video'],
                        ['title' => 'My second video'],
                        ['title' => 'My third video'],
                    )
                )
                ->count(3)
        )
        ->create();

    loginAsUser();
    get(route('page.course-videos', [
        'course' => $course,
        'video' => $course->videos()->orderByDesc('id')->first(),
    ]))
        ->assertOk()
        ->assertSeeText(
            ['My third video']
        );
});
