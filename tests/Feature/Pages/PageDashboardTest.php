<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Carbon;

use function Pest\Laravel\get;

test('cannot be accessed by guest', function () {
    get(route('dashboard'))
        ->assertRedirect(route('login'));
});

test('lists purchased courses', function () {
    $user = User::factory()
        ->has(Course::factory()->count(3)->state(
            new Sequence(
                ['title' => 'Course A'],
                ['title' => 'Course B'],
                ['title' => 'Course C'],
            )
        ))
        ->create();

    loginAsUser($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSeeText([
            'Course A',
            'Course B',
            'Course C',
        ]);
});

test('does not list other courses', function () {
    $user = User::factory()->has(Course::factory()->count(3)->state(
        new Sequence(
            ['title' => 'Course A'],
            ['title' => 'Course B'], )
    ))
        ->create();

    $anotherUser = User::factory()->has(Course::factory()->count(3)->state(
        new Sequence(
            ['title' => 'Course C'],
            ['title' => 'Course E'], )
    ))
        ->create();

    $courseWithoutUser = Course::factory()->create();

    loginAsUser($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSeeText([
            'Course A',
            'Course B',
        ])
        ->assertDontSeeText([
            'Course C',
            'Course E',
            $courseWithoutUser->title,
        ]);
});

test('shows latest purchased courses', function () {
    $user = User::factory()->create();
    $firstPurchasedCourse = Course::factory()->create();
    $lastPurchasedCourse = Course::factory()->create();

    $user->courses()->attach($firstPurchasedCourse->id, ['created_at' => Carbon::yesterday()]);
    $user->courses()->attach($lastPurchasedCourse->id, ['created_at' => Carbon::now()]);

    loginAsUser($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSeeTextInOrder([
            $lastPurchasedCourse->title,
            $firstPurchasedCourse->title,
        ]);
});

test('includes link to products videos', function () {
    $user = User::factory()
        ->has(Course::factory())
        ->create();

    loginAsUser($user);
    get(route('dashboard'))
        ->assertOk()
        ->assertSeeText('Watch videos')
        ->assertSee(route('page.course-videos', Course::first()));
});
