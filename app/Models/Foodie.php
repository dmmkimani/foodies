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

    public function commentLikes() {
        return $this->hasMany(CommentLike::class);
    }

    public static function getAllUsernames()
    {
        $username_list = [];
        $foodies = Foodie::get();
        foreach($foodies as $foodie) {
            $username_list[] = $foodie->username;
        }
        
        return $username_list;
    }
}
