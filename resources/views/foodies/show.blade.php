@extends('layouts.app')

@section('content')
<ul>
    <div>
        @if ($foodie->profile_picture)
            <div class="profile_picture"></div>
        @endif
        <h2 class="name" style="margin-top:10px;">
            @if ($foodie->first_name)
                {{$foodie->first_name}}
            @endif
            @if ($foodie->last_name)
                 {{$foodie->last_name}}
            @endif
        </h2>
        <h3 class="username" style="margin-bottom:15px;">{{$foodie->username}}</h3>
    </div>
    @if ($foodie->bio)
        <div id="description">
            <h3>Bio:</h3>
            <p>{{$foodie->bio}}</p>
        </div>
    @endif
    <div>
        <h3>Reviews:</h3>

    </div>
</ul>
@endsection