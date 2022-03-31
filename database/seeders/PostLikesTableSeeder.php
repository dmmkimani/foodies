<?php

namespace Database\Seeders;

use App\Models\Foodie;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $username_list = Foodie::getAllUsernames();
        for ($i = 1; $i < Post::count(); $i++) {
            shuffle($username_list);
            for ($j = 0; $j < rand(0, 100); $j++) {
                Postlike::insert([
                    'post_id' => $i,
                    'foodie_username' => $username_list[$j]
                ]);
            }
        }
    }
}
