<?php

namespace Database\Factories;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $title = $this->faker->sentence;
        $description = $this->faker->realText(2000);
        $ranGrade = Grade::inRandomOrder()->first()->id;
        $ranSubject = Subject::inRandomOrder($ranGrade)->first()->id;
        return [
            "grade_id" => $ranGrade,
            "subject_id" => $ranSubject,
            "title" => $title,
            "excerpt_title" => Str::substrReplace($title,"...",20),
            "slug" => Str::slug($title),
            "description" => $description,
            "excerpt" => Str::substrReplace($description,"...",50),
            "user_id" => User::inRandomOrder()->first()->id,
        ];
    }
}
