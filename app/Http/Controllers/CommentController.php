<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentPosted;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required|string|max:300'
        ]);
        
        $c = new Comment();
        $c->user_username = $request->user()->username;
        $c->post_id = $request['post_id'];
        $c->comment = $validatedData['comment'];
        $c->save();

        CommentController::sendNotification(
            $c->post,  
            $c->user_username, 
            $c->comment
        );

        return $c;
    }
    
    public function apiShow(Post $post) 
    {
        $response = [
            $post->id,
            $post->comments
        ];
        return $response;
    }

    public function apiDestroy(Request $request)
    {
        $id = $request['comment_id'];
        Comment::FindOrFail($id)->delete();
        
    }

    public function sendNotification(Post $post, String $user_username, String $comment)
    {
        $post->user->notify(new CommentPosted($post, $user_username, $comment));
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
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
