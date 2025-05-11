<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $freeImages = [
            'https://picsum.photos/seed/a/800/600',
            'https://picsum.photos/seed/b/800/600',
            'https://picsum.photos/seed/c/800/600',
            'https://picsum.photos/seed/d/800/600',
            'https://picsum.photos/seed/e/800/600',
        ];

        foreach ($users as $user) {
            $postsCount = rand(0, 15);

            for ($i = 0; $i < $postsCount; $i++) {
                Post::create([
                    'user_id' => $user->id,
                    'title' => Str::title(fake()->words(4, true)),
                    'content' => fake()->paragraphs(rand(2,10), true),
                    'images' => json_encode(Arr::random($freeImages, rand(1, 3))),
                ]);
            }
        }
    }
}
