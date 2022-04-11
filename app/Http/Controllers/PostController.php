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
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->get();
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
            'review' => 'required|max:500',
            'rating' => 'required|integer|min:0|max:5'
        ]);
        
        $p = new Post();

        // REALLY NEED TO CHANGE THIS
        $p->foodie_username = 'xconroy';
        // REALLY NEED TO CHANGE THIS
        
        $p->restaurant_id = $validatedData['restaurant_id'];
        $p->meal_picture = $validatedData['meal_picture'];
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
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('message', 'Your Review Has Been Deleted');
    }
}
