<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Information;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($x = 0; $x < rand(1,10); $x++) {
        //     $user = User::factory()->create();
        //     $userinfo = Information::factory()->for($user)->create();
        //     for ($y = 0; $y < rand(1,3); $y++)
        //         $post = Post::factory()->for($user)->has(Comment::factory()->count(rand(1,5)))->create();
        //         #
        // };
        for ($x = 0; $x < 6; $x++) {
                $user = User::factory()->create();
                $userinfo = Information::factory()->for($user)->create();
        }
        Post::factory()->count(20)->create();
        Comment::factory()->count(100)->create();

        $t1 = Tag::create([
            'name' => 'funny'
        ]);

        $t2 = Tag::create([
            'name' => 'educational'
        ]);

        $t3 = Tag::create([
            'name' => 'sad'
        ]);

        $all_posts = Post::all();
        foreach ($all_posts as $post){
            $y = rand(1,10);
            if ($y%2 == 0){
                $t1->posts()->attach($post->id);
            }
            if ($y < 6){
                $t2->posts()->attach($post->id);
            }
            if ($y > 5){
                $t2->posts()->attach($post->id);
            }

        }

    }
}
