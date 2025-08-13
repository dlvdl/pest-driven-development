<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'tagline' => $this->faker->sentence,
            'image_name' => 'image.png',
            'learnings' => [
                $this->faker->paragraph,
                $this->faker->paragraph,
                $this->faker->paragraph,
            ],
        ];
    }

    public function released(?Carbon $date = null): self
    {
        return $this->state(
            fn ($attributes) => ['released_at' => $date ?? Carbon::now()]
        );
    }
}
