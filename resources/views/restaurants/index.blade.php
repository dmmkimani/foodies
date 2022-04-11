@extends('layouts.app')

@section('content')

@foreach ($restaurants as $restaurant)
<a href="{{route('restaurants.show', ['restaurant'=>$restaurant])}}">
    <div class="restaurant">
        <h2>{{$restaurant->name}}</h2>
        @for ($i = 0; $i < round($restaurant->posts->avg('rating')); $i++) <span class="fa fa-star checked"></span>
            @endfor

            @for ($i = 0; $i < (5 - round($restaurant->posts->avg('rating'))); $i++) <span class="fa fa-star"></span>
                @endfor
    </div>
</a>
@if ($restaurant->id % 10 != 0)
<hr class="rounded">
@endif
@endforeach
<span>
    {{$restaurants->links()}}
</span>
@endsection