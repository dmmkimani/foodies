<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Notifications\PostLiked;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function apiStore(Request $request)
    {
        $l = new Like();
        $l->user_username = $request['user_username'];
        $l->likeable_id = $request['likeable_id'];
        $l->likeable_type = "App\Models\\".$request['likeable_type'];
        $l->save();
        
        LikeController::sendNotification(
            $l->likeable,
            $l->user_username
        );

        return $l;
    }
    
    public function apiShow(User $user, String $likeable_type, int $likeable_id)
    {
        if ($likeable_type == 'Post') {
            $user_like = Like::get()->where('user_username', $user->username)->where('likeable_id', $likeable_id)->where('likeable_type', 'App\Models\Post');
            return [
                $likeable_id,
                $likeable_type,
                Post::FindOrFail($likeable_id)->likes,
                !$user_like->isEmpty() ? true : false
            ];
        } else if ($likeable_type == 'Comment') {
            $user_like = Like::get()->where('user_username', $user->username)->where('likeable_id', $likeable_id)->where('likeable_type', 'App\Models\Comment');
            return [
                $likeable_id,
                $likeable_type,
                Comment::FindOrFail($likeable_id)->likes,
                !$user_like->isEmpty() ? true : false
            ];
        } else {
            return [];
        }
    }

    public function apiDestroy(Request $request)
    {
        Like::where('user_username', $request['user_username'])
            ->where('likeable_id', $request['likeable_id'])
            ->where('likeable_type', "App\Models\\".$request['likeable_type'])
            ->delete();
    }

    public function sendNotification($likeable, String $user_username)
    {
        $likeable->user->notify(new PostLiked($likeable, $user_username));
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
