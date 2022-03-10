<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    public function foodie() {
        return $this->belongsTo(Foodie::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function commentLikes() {
        return $this->hasMany(CommentLike::class);
    }
}
