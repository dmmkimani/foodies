<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Restaurant;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(FoodiesTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
    }
}
