<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Posts;
use App\Models\Category;
use Illuminate\Database\Seeder;

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
        // \App\Models\User::factory(10)->create();
        Category::create([
            'title' => 'Web Development',
        ]);
        Category::create([
            'title' => 'Laravel',
        ]);
        Category::create([
            'title' => 'Tailwind CSS',
        ]);
        Posts::factory(50)->create();
        User::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Arif Budiman Arrosyid',
        //     'email' => 'arifbudimanarrosyid@gmail.com',
            // 'email' => 'password',
        // ]);
    }
}
