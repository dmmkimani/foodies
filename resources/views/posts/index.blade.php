@extends('layouts.app')

@section('content')
<ul>
    @foreach ($posts as $post)
    <div>
        <div>
            <h2>
                <a href="{{route('restaurants.show', ['id'=>$post->restaurant_id])}}">
                    {{$post->restaurant->name}}
                </a>
            </h2>
            <h3>{{$post->restaurant->address}}</h3>
        </div>
        <div style="width:500px;height:300px;border:1px solid #000;"></div>
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
        <h5>Posted By: {{$post->foodie->first_name}} {{$post->foodie->last_name}}</h5>
        <button type="button" class="collapsible">View Comments</button>
    </div>
    @endforeach
</ul>
@endsection