@extends('layouts.app')

@section('content')
<div>
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
@if (auth()->user())
@if ($user->username == auth()->user()->username)
<div>
    <a href="{{route('users.edit', ['user'=>$user])}}" class="button default">Edit Profile</a>
</div>
<form method="POST" action="{{route('logout')}}">
    @csrf
    <div>
        <input class="button default" type="submit" style="background-color: red;" value="Logout">
    </div>
</form>
@endif
@endif
@if ($user->bio)
<div id="description">
    <h3>Bio:</h3>
    <p>{{$user->bio}}</p>
</div>
@endif
@endsection