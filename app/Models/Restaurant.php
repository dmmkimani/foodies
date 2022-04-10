<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public static function getId(String $name) {
        $restaurants = Restaurant::get()->where('name', $name);

        foreach($restaurants as $restaurant) {
            return $restaurant->id;
        }
    }
}
