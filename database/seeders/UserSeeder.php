<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();


        User::factory()->create([
            'name' => 'Si Thu Kyaw',
            'email' => 'stk@gmail.com',
            'role' => '0',
            "password" => Hash::make('asdffdsa')
        ]);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'role' => '0',
            "password" => Hash::make('asdffdsa')
        ]);

        User::factory()->create([
            'name' => 'Test Editor',
            'email' => 'editor@gmail.com',
            'role' => '1',
            "password" => Hash::make('asdffdsa')
        ]);

        User::factory()->create([
            'name' => 'Test Author',
            'email' => 'author@gmail.com',
            'role' => '2',
            "password" => Hash::make('asdffdsa')
        ]);
    }
}
