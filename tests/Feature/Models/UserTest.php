<?php

use App\Models\Course;
use App\Models\User;

it('has courses', function () {
    $user = User::factory()
        ->has(Course::factory()->count(3))
        ->create();

    expect($user->courses)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Course::class);
});
