<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\PurchasedCourse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PurchasedCourseFactory extends Factory
{
    protected $model = PurchasedCourse::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => User::factory(),
            'course_id' => Course::factory(),
        ];
    }
}
