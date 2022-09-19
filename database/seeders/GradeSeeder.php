<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = ["Grade KG","Grade 1","Grade 2","Grade 3","Grade 4","Grade 5"
                    ,"Grade 6","Grade 7","Grade 8","Grade 9","Grade 10"];
        foreach ($grades as $grade){
            Grade::factory()->create([
                "title" => $grade,
                "slug" => Str::slug($grade),
                "user_id" => User::inRandomOrder()->first()->id
            ]);
        }
    }
}
