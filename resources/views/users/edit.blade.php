@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('users.update', ['user'=>$user])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <h2 style="text-align: center;">Edit Your Profile</h2>
    </div>
    <div>
        <label for="first_name">First Name:</label>
        <div style="text-align: center;">
            <input type="text" name="first_name" value="{{old('first_name', $user->first_name)}}">
        </div>
        @error('first_name')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="last_name">Last Name:</label>
        <div style="text-align: center;">
            <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}">
        </div>
        @error('last_name')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="bio">Bio</label>
        <textarea name="bio" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>{{old('bio', $user->bio)}}</textarea>
        @error('bio')
        <div class="error">{{$message}}</div>
        @enderror
    </div>
    <div>
        <input class="button default" type="submit" value="Save">
    </div>
    <div style="text-align:center">
        <a href="{{route('users.show', ['user'=>$user])}}">Cancel</a>
    </div>
</form>
@endsection