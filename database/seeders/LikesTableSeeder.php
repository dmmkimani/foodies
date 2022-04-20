<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $username_list = User::getAllUsernames();
        
        for ($i = 1; $i < Post::count(); $i++) {
            shuffle($username_list);
            for ($j = 0; $j < rand(0, 100); $j++) {
                Like::insert([
                    'user_username' => $username_list[$j],
                    'likeable_id' => $i,
                    'likeable_type' => 'App\Models\Post'
                ]);
            }
        }

        for ($i = 1; $i < Comment::count(); $i++) {
            shuffle($username_list);
            for ($j = 0; $j < rand(0, 100); $j++) {
                Like::insert([
                    'user_username' => $username_list[$j],
                    'likeable_id' => $i,
                    'likeable_type' => 'App\Models\Comment'
                ]);
            }
        }
    }
}
