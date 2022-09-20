<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ["Myanmar","English","Mathematics","Economy","Chemistry","Physics"];

        foreach (Grade::all() as $grade){
            foreach ($subjects as $subject){
                Subject::factory()->create([
                    "grade_id" => $grade->id,
                    "title" => $subject,
                    "slug" => Str::slug($subject),
                    "user_id" => User::inRandomOrder()->first()->id
                ]);
            }
        }

    }
}
