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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

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
            text-align: center;
            color: green;
            font-weight: bold;
        }

        div.error {
            text-align: center;
            color: red;
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

        ul.nav {
            padding-left: 0px;
            text-align: center;
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

        h2 {
            font-size: 30px;
            font-weight: bold;
            color: green;
        }

        h2.nav {
            color: white;
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
            font-weight: bold;
            color: black;
        }

        h4.url {
            color: blue;
        }

        h5 {
            color: grey;
        }

        label {
            font-weight: bold;
        }

        input {
            text-align: center;
            width: 100%;
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

        .review {
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

        .review:hover {
            color: black;
            background-color: lightgreen;
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

        .checked {
            color: gold;
        }

        .collapsible {
            cursor: pointer;
            margin-top: 10px;
        }

        .collapsible::after {
            content: '+';
            color: black;
            margin-left: 5px;
        }

        .active::after {
            content: '-';
            color: black;
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div id="header">
        <h1>Foodies</h1>
        <ul class="nav">
            <li>
                <h2 class="nav">
                    <a href="{{route('home')}}">
                        Home
                    </a>
                </h2>
            </li>
            <li>
                <h2 class="nav">
                    <a href="{{route('restaurants.index')}}">
                        Restaurants
                    </a>
                </h2>
            </li>
            <li>
                <h2 class="nav">Your Profile</h2>
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