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
        // PostLike::factory()->count(10)->create();
        
        $username_list = [];
        $foodies = Foodie::get();
        foreach($foodies as $foodie) {
            $username_list[] = $foodie->username;
        }

        for ($i = 1; $i < Post::count(); $i++) {
            shuffle($username_list);
            for ($j = 0; $j < rand(1, 150); $j++) {
                Postlike::insert([
                    'post_id' => $i,
                    'foodie_username' => $username_list[$j]
                ]);
            }
        }
    }
}
