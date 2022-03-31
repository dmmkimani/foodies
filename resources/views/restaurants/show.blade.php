@extends('layouts.app')

@section('content')
<ul>
    <div>
        <h2>{{$restaurant->name}}</h2>
        <h3>{{$restaurant->address}}</h3>
        <h4>Telephone Number: {{$restaurant->telephone_number}}</h4>
    </div>
    <div id="about">
        <h3>About:</h3>
        <p>{{$restaurant->about}}</p>
    </div>
</ul>
@endsection