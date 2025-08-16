<?php

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('has courses', function () {
    $user = User::factory()
        ->has(Course::factory()->count(3))
        ->create();

    expect($user->courses)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Course::class);
});

