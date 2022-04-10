@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <h2 style="text-align: center;">Write a Review</h2>
    </div>
    <div>
        <label for="restaurant_name">Please enter the restaurant's name:</label>
        <input type="text" name="restaurant_name" value="{{old('restaurant_name')}}">
    </div>
    <div>
        <label for="meal_picture">Please upload a picture of the meal:</label>
        <input type="file" name="meal_picture">
    </div>
    <div>
        <label for="price">How much did it cost? (&#163)</label>
        <div style="text-align: center;">
            <input class="input price" type="number" name="price" min="0" step=".01" value="{{old('price')}}">
        </div>
    </div>
    <div>
        <label for="review">What did you think?</label>
        <textarea name="review">{{old('review')}}</textarea>
    </div>
    <div>
        <label for="rating">Rating:</label>
        <div style="text-align: center;">
            <p><input class="input rating" type="number" name="rating" min="0" max="5" value="{{old('rating')}}"> / 5</p>
        </div>
    </div>
    <div>
        <input class="button new_review" type="submit" value="Post">
    </div>
</form>
@endsection