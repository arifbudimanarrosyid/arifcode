<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Guestbook;
use Illuminate\Support\Str;
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
            'title' => 'Laravel',
        ]);
        Category::create([
            'title' => 'Tailwind CSS',
        ]);
        Category::create([
            'title' => 'Alpine JS',
        ]);
        Category::create([
            'title' => 'Web Development',
        ]);
        Category::create([
            'title' => 'Personal',
        ]);
        Post::factory(10)->create();


        User::factory()->create([
            'name' => 'ArifCode',
            'email' => 'arifcode@admin.com',
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'is_admin' => 1,
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'User3',
            'email' => 'user3@user.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Guestbook::create([
            'user_id' => 1,
            'message' => 'Welcome to my blog, feel free to leave a message.',
            'is_pinned' => 1,
            'created_at' => now()->addMinutes(-5),
            'updated_at' => now(),
        ]);
        Guestbook::create([
            'user_id' => 2,
            'message' => 'Hello from Jogja',
            'created_at' => now()->addMinutes(-37),
            'updated_at' => now(),
        ]);
        Guestbook::create([
            'user_id' => 3,
            'message' => 'Hello from Indonesia',
            'created_at' => now()->addMinutes(-50),
            'updated_at' => now(),
        ]);
        Guestbook::create([
            'user_id' => 4,
            'message' => 'Hello there, hope you all doing well.',
            'created_at' => now()->addMinutes(-7),
            'updated_at' => now(),
        ]);
    }
}
