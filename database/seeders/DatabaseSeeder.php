<?php

namespace Database\Seeders;

use App\Models\Comment;
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
        
        DatabaseSeeder::getRatings();
    }

    public function getRatings()
    {
        for ($i = 1; $i <= Restaurant::count(); $i++) {
            $avg_rating = Post::get()->where('restaurant_id', $i)->avg('rating');
            Restaurant::where('id', $i)->update(['rating' => $avg_rating]);
        }
    }
}
