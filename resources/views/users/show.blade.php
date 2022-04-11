@extends('layouts.app')

@section('content')
<div>
    @if ($user->profile_picture)
    <img class="profile_picture" src="{{route('images.show', ['filename'=>$user->profile_picture])}}">
    @endif
    <h2 class="name" style="margin-top:10px;">
        @if ($user->first_name)
        {{$user->first_name}}
        @endif
        @if ($user->last_name)
        {{$user->last_name}}
        @endif
    </h2>
    <h3 class="username" style="margin-bottom:15px;">{{$user->username}}</h3>
</div>
@if ($user->bio)
<div id="description">
    <h3>Bio:</h3>
    <p>{{$user->bio}}</p>
</div>
@endif
<div>
    <h3>Reviews:</h3>

</div>
@endsection