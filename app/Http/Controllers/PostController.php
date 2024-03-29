<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(15);
        if (auth()->user()) {
            $user = auth()->user();
            return view('posts.index', ['posts'=>$posts, 'user'=>$user]);
        } else {
            return view('posts.index', ['posts'=>$posts]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::orderBy('name', 'ASC')->get();
        return view('posts.create', ['restaurants'=>$restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'meal_picture' => 'required|mimes:jpg,jpeg,png',
            'price' => 'required|min:0',
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:0|max:5'
        ]);

        $filename = $request->user()->username.'.'.time();
        $validatedData['meal_picture']->move(public_path('images'), $filename);
        
        $p = new Post();
        $p->user_username = $request->user()->username;
        $p->restaurant_id = $validatedData['restaurant_id'];
        $p->meal_picture = $filename;
        $p->price = $validatedData['price'];
        $p->rating = $validatedData['rating'];
        $p->review = $validatedData['review'];
        $p->save();

        return redirect()->route('posts.index')
            ->with('message', 'Your Review Has Been Posted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = auth()->user();
        return view('posts.show', ['post'=>$post, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $restaurants = Restaurant::orderBy('name', 'ASC')->get();
        return view('posts.edit', ['post'=>$post, 'restaurants'=>$restaurants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'price' => 'required|min:0',
            'review' => 'required|max:500',
            'rating' => 'required|integer|min:0|max:5'
        ]);

        Post::where('id', $post->id)->update([
            'restaurant_id' => $validatedData['restaurant_id'],
            'price' => $validatedData['price'],
            'rating' => $validatedData['rating'],
            'review' => $validatedData['review']
        ]);

        return redirect()->route('posts.index')
            ->with('message', 'Review Successfully Amended');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('message', 'Review Successfully Deleted');
    }
}
