<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UZ Wildcats</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/undraw_welcome_cats_thqn.svg');
            background-repeat: no-repeat; 
            background-position: bottom 30px center;
            background-size: 550px;
        }
    </style>
</head>
<body class="bg-gray-200 h-screen antialiased leading-none">
<div class="flex flex-col">
    @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase pr-6">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center -my-32">
        
        <img class="w-20 rounded-full mr-5" src="/images/profile/UZ-Wildcats.jpg" />
        <div class="flex flex-col justify-around h-full">
            <div>
                <h1 class="text-green-600 text-center font-bold tracking-wider text-5xl"> 
                    UZ Wildcats </br><hr>
                    <p class="text-lg italic text-gray-900 font-thin">Universidad de Zamboanga</p>
                </h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>
