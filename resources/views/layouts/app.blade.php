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

        #about {
            background-color: #eeeeee;
            padding: 20px;
        }

        div {
            margin-bottom: 15px;
        }

        h1 {
            font-size: 50px;
            font-weight: bold;
        }

        h2 {
            font-size: 30px;
            font-weight: bold;
            color: green;
        }

        h3 {
            font-size: 20px;
            font-weight: bold;
            color: black;
        }

        h4 {
            font-weight: bold;
            color: black;
        }

        h5 {
            color: grey;
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
    </div>
    <div id="content">
        @yield('content')
    </div>
</body>

</html>