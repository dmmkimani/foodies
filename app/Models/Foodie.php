<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodie extends Model
{
    use HasFactory;

    protected $primaryKey = 'username';
    protected $keyType = 'string';
    
    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function postLikes() {
        return $this->hasMany(PostLike::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function randomFoodie() 
    {
        $foodies_list = [];
        $foodies = Foodie::get();
        foreach($foodies as $foodie) {
            $foodies_list[] = $foodie->username;
        }
        return $foodies_list[array_rand($foodies_list)];
    }
}
