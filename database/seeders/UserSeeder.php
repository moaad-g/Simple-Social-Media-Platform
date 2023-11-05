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
        for ($x = 0; $x < rand(1,10); $x++) {
            $user = User::factory()->create();
            $userinfo = Information::factory()->for($user)->create();
            for ($y = 0; $y < rand(1,3); $y++)
                $post = Post::factory()->for($user)->has(Comment::factory()->count(rand(1,5)))->create();
                #
        };
    }
}
