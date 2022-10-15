<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            GradeSeeder::class,
            SubjectSeeder::class,
            LessonSeeder::class,
        ]);

        $header_image = Storage::allFiles('public/header_image');
        Storage::delete($header_image);
        $lesson_image = Storage::allFiles('public/lesson_image');
        Storage::delete($lesson_image);
        $profile = Storage::allFiles('public/profile');
        Storage::delete($profile);

        echo "\e[93mphoto deleted \n";
    }
}
