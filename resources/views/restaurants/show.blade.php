@extends('layouts.app')

@section('content')
<ul>
    <div>
        <h2>{{$restaurant->name}}</h2>
        <h3>{{$restaurant->address}}</h3>
        @if ($restaurant->website)
            <h4 class="url">{{$restaurant->website}}</h4>
        @endif
        <h4>Telephone Number: {{$restaurant->telephone_number}}</h4>
        @for ($i = 0; $i < $rating; $i++) <span class="fa fa-star checked"></span>
            @endfor

            @for ($i = 0; $i < (5 - $rating); $i++) <span class="fa fa-star"></span>
                @endfor
    </div>
    <div id="description">
        <h3>About:</h3>
        <p>{{$restaurant->about}}</p>
    </div>
    <div>
        <h3>Reviews:</h3>
        
    </div>
</ul>
@endsection