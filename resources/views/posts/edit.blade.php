@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('posts.update', ['post'=>$post])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <h2 style="text-align: center;">Write a Review</h2>
    </div>
    <div>
        <label for="restaurant_id">Which restaurant would you like to write a review for?</label>
        <select name="restaurant_id">
            @foreach ($restaurants as $restaurant)
            <option value="{{$restaurant->id}}" @if ($restaurant->id == old('restaurant_id', $post->restaurant_id))
                selected="selected"
                @endif
                >{{$restaurant->name}}
            </option>
            @endforeach
        </select>
        @error('restaurant_id')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="price">How much did it cost? (&#163)</label>
        <div style="text-align: center;">
            <input class="input price" type="number" name="price" min="0" step=".01" value="{{old('price', $post->price)}}">
        </div>
        @error('price')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="review">What did you think?</label>
        <textarea name="review">{{old('review', $post->review)}}</textarea>
        @error('review')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="rating">Rating:</label>
        <div style="text-align: center;">
            <p><input class="input rating" type="number" name="rating" min="0" max="5" value="{{old('rating', $post->rating)}}"> / 5</p>
        </div>
        @error('rating')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <input class="button default" type="submit" value="Amend">
    </div>
    <div style="text-align:center">
        <a href="{{route('posts.index')}}">Cancel</a>
    </div>
</form>
@endsection