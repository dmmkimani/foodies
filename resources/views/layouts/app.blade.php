<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <style>
        #header {
            position: sticky;
            top: 0;
            background-color: black;
            color: white;
            text-align: center;
            padding: 30px;
        }

        #content {
            max-width: 500px;
            margin: auto;
            background-color: white;
            color: black;
            text-align: start;
        }

        #description {
            background-color: #eeeeee;
            padding: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        div.message {
            font-size: 18px;
            text-align: center;
            color: green;
            font-weight: bold;
        }

        div.error {
            text-align: center;
            color: red;
            font-weight: bold;
        }

        div.restaurant {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        div.rating {
            margin-top: 10px;
            text-align: center;
            font-size: 30px
        }

        a {
            color: black;
            text-decoration: none;
        }

        a.url {
            color: blue;
        }

        img {
            display: block;
        }

        img.post_picture {
            width: 500;
            height: 375;
            margin-bottom: 7.5px;
        }

        img.profile_picture {
            margin: auto;
            width: 340px;
            height: 255px;
            margin-bottom: 10px;
        }

        ul.nav>li {
            display: inline-block;
            padding: 10px 20px;
        }

        ul.nav>li>h2>a {
            color: white;
        }

        ul.nav>li:hover,
        ul.nav>li>h2>a:hover {
            color: black;
            background-color: green;
        }

        h1 {
            font-size: 60px;
            font-weight: bold;
        }

        h2,
        h2>a {
            font-size: 30px;
            font-weight: bold;
            color: green;
        }

        h3 {
            font-size: 20px;
            font-weight: bold;
            color: grey;
        }

        h2.name,
        h3.username {
            text-align: center;
        }

        h4 {
            margin-top: 10px;
            font-size: 16px;
            font-weight: 600;
            color: black;
        }

        h5,
        h5>a {
            font-size: 16px;
            color: grey;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        input.price {
            text-align: center;
            width: 120px;
        }

        input.rating {
            text-align: center;
            width: 80px;
        }

        input.newComment {
            width: 85%;
            text-align: left;
        }

        select {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .default {
            color: white;
            background-color: green;
            display: block;
            padding: 16px 32px;
            text-align: center;
            font-size: 18px;
            margin: auto;
            transition-duration: 0.5s;
            cursor: pointer;
        }

        .default:hover {
            color: black;
            background-color: lightgreen;
        }

        .checked {
            color: gold;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>Foodies</h1>
        <ul class="nav justify-content-center" role="tablist">
            <li class="active">
                <h2>
                    <a href="{{route('home')}}">
                        Home
                    </a>
                </h2>
            </li>
            <li>
                <h2>
                    <a href="{{route('restaurants.index')}}">
                        Restaurants
                    </a>
                </h2>
            </li>
            <li>
                <h2>
                    @if (auth()->user())
                    <a href="{{route('users.show', ['user'=>auth()->user()])}}">
                        Your Profile
                    </a>
                    @else
                    <a href="{{route('login', ['user'=>auth()->user()])}}">
                        Sign In
                    </a>
                    @endif
                </h2>
            </li>
        </ul>
    </div>
    @if (session('message'))
    <div class="message">
        {{session('message')}}
    </div>
    @endif
    <div id="content">
        @yield('content')
    </div>
</body>

</html>