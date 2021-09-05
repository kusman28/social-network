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
            /* background-image: url('/images/undraw_welcome_cats_thqn.svg');
            background-repeat: no-repeat; 
            background-position: bottom 30px center;
            background-size: 550px; */
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
        
        <img class="w-20 rounded-full mr-5 sm:shadow-sm sm:shadow-lg" src="/images/profile/UZ-Wildcats.jpg" />
        <div class="flex flex-col justify-around h-full mr-10">
            <div>
                <h1 class="text-green-600 text-center font-bold tracking-wider text-5xl mb-2"> 
                    UZ Wildcats <hr>
                </h1>
                <p class="text-center text-lg italic text-gray-800 font-thin">❝ Wat UZ iz wat u get.❞</p>
            </div>
        </div>

        {{-- Login --}}
        <div class="flex">
            <div class="w-full">
                <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
    
                    {{-- <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Login') }}
                    </header> --}}
    
                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST" action="{{ route('login') }}">
                        @csrf
    
                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('UZ E-Mail Address') }}:
                            </label>
    
                            <input id="email" type="email"
                                class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="your.email@one.uz.edu.ph" autofocus>
    
                            @error('email')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
    
                        <div class="flex flex-wrap">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Password') }}:
                            </label>
    
                            <input id="password" type="password"
                                class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                                required>
    
                            @error('password')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
    
                        <div class="flex items-center">
                            <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                <input type="checkbox" name="remember" id="remember" class="form-checkbox"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <span class="ml-2">{{ __('Remember Me') }}</span>
                            </label>
    
                            @if (Route::has('password.request'))
                            <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline hover:underline ml-auto"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
    
                        <div class="flex flex-wrap">
                            <button type="submit"
                            class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-green-500 hover:bg-green-700 sm:py-4">
                                {{ __('Login') }}
                            </button>
    
                            @if (Route::has('register'))
                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">
                                {{ __("Don't have an account?") }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline hover:underline" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                            </p>
                            @endif
                        </div>
                    </form>
    
                </section>
            </div>
        </div>
    </div>
</div>
</body>
</html>
