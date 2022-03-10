<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Foodie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $username_list = Foodie::getUsernames();
        for ($i = 1; $i < Comment::count(); $i++) {
            shuffle($username_list);
            for ($j = 0; $j < rand(0, 100); $j++) {
                CommentLike::insert([
                    'comment_id' => $i,
                    'foodie_username' => $username_list[$j]
                ]);
            }
        }
    }
}
