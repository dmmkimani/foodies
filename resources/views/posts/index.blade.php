@extends('layouts.app')

@section('content')

<div>
    <a href="{{route('posts.create')}}" class="button default">Write a Review</a>
</div>

<hr class="rounded" style="margin-bottom: 10px;">

@foreach ($posts as $post)
<div>
    <div>
        <h2>
            <a href="{{route('restaurants.show', ['restaurant'=>$post->restaurant])}}">
                {{$post->restaurant->name}}
            </a>
        </h2>
        <h3>{{$post->restaurant->address}}</h3>
    </div>
    <img class="post_picture" src="{{route('images.show', ['filename'=>$post->meal_picture])}}">
    <div>
        <h4>&#163 {{$post->price}}</h4>

        @for ($i = 0; $i < $post->rating; $i++)
            <span class="fa fa-star checked"></span>
            @endfor

            @for ($i = 0; $i < (5 - $post->rating); $i++)
                <span class="fa fa-star"></span>
                @endfor

                <p>{{$post->review}}</p>
    </div>
    @isset ($user)
    @if ($user->username == $post->user->username)
    <div>
        <a href="{{route('posts.edit', ['post'=>$post])}}" class="button default">Amend Review</a>
    </div>
    <form method="POST" action="{{route('posts.destroy', ['post'=>$post])}}">
        @csrf
        @method('DELETE')
        <div>
            <input class="button default" type="submit" style="background-color: red;" value="Delete Review">
        </div>
    </form>
    @else
    <h5>
        <a href="{{route('users.show', ['user'=>$post->user])}}">
            Posted By: {{$post->user->username}}
        </a>
    </h5>
    @endif
    @else
    <h5>
        <a href="{{route('users.show', ['user'=>$post->user])}}">
            Posted By: {{$post->user->username}}
        </a>
    </h5>
    @endisset
</div>
<div style="text-align: center;">
<a href="{{route('posts.show', ['post'=>$post])}}">
    View Likes and Comments
</a>
</div>
<hr class="rounded" style="margin-top:10px; margin-bottom: 10px;">
@endforeach
<span>
    {{$posts->links()}}
</span>
@endsection