<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Information;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::factory()->count(1)
        // ->has((Post::factory()->count(1))
        // ->has(Comment::factory()->count(2)))
        // ->create();
        for ($x = 0; $x < 1; $x++) {
            $user = User::factory()->create();
            $userinfo = Information::factory()->for($user)->create();
            for ($y = 0; $y < 2; $y++)
                $post = Post::factory()->for($user)->has(Comment::factory()->count(3))->create();
                #
        };
    }
}
